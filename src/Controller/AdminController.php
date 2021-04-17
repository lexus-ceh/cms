<?php


namespace App\Controller;

use App\Factory\PaginatorFactory;
use App\Model\Comment;
use App\Model\Roles;
use App\Model\Roles_user;
use App\Model\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;


class AdminController
{
    public function admin()
    {
        if (isUserRole('administrator') !== false || isUserRole('moderator') !== false) {
            return view('admin.admin', ['title' => 'ADMIN PANEL']);
        }
        header('Location: /');
    }

    public function admin2($item)
    {
        $item = explode('?', $item)[0];

        LengthAwarePaginator::currentPageResolver(function ($pageName) {
            return $_GET[$pageName] ?? '1';
        });

        LengthAwarePaginator::currentPathResolver(function () {
            return explode('?', $_SERVER['REQUEST_URI'])[0];
        });

        LengthAwarePaginator::viewFactoryResolver(function () {
            return new PaginatorFactory();
        });

        $data[] = $item;
        if (isUserRole('administrator') !== false || isUserRole('moderator') !== false) {
            if($item == 'users') {
                $users = $this->adminAllUsers();
                $data[] = $users;
            }
            if($item == 'allcomments') {
                $allComments = $this->adminGetComments();
                $data[] = $allComments;
            }
            if($item == 'unapprovedcomments') {
                $unapprovedComments = $this->adminGetComments(0);
                $data[] = $unapprovedComments;
            }
            return view('admin.admin2', $data);
        }
        header('Location: /');
    }

    public function adminAllUsers()
    {
        if (isUserRole('administrator') !== false) {
            if (isset($_POST['id']) && $_POST['id'] != 0) {
                $query = User::select('users.id', 'email', 'users.name as name', 'password', 'users.avatar', 'users.about', 'users.is_banned');
                // $roles = Roles::select('name', 'description')->get();
            } else {
                $query = User::select('users.id', 'email', 'users.name as name', 'password', 'users.is_banned');
            }
            return ($query
                ->selectRaw('GROUP_CONCAT(roles.name) as role')
                ->leftJoin('roles_users', 'users.id', '=', 'roles_users.users_id')
                ->leftJoin('roles', 'roles.id', '=', 'roles_users.roles_id')
                ->where(function (Builder $query) {
                    if (!isset($_POST['id']) || $_POST['id'] == 0) {
                        return $query;
                    } else {
                        $id = (int) $_POST['id'];
                        return $query->where('users.id', '=', $id);
                    }
                })
                ->groupBy('users.id')
                ->get());
        }
        header('Location: /');
    }

    public function adminAllRoles() {
        if (isUserRole('administrator') !== false) {
            return json_encode(Roles::all());
        }
        header('Location: /');
    }

    public function adminUserChange() {
        if (isUserRole('administrator') !== false) {
            $user = User::find((int) $_POST['user_id'] ?? 0);

            //TODO: добавить, чтобы не меняли параметры для "суперпользователя"

            if (isset($_POST['is-banned']) && $_POST['is-banned'] === 'true') {
                $user->is_banned = 1;
            }
            if (isset($_POST['is-banned']) && $_POST['is-banned'] === 'false') {
                $user->is_banned = 0;
            }
            $user->save();

            // $rolesUser = Roles_user::where('users_id', $user->id)->delete();

            foreach ($_POST as $role => $roleValue) {
                if (strpos($role, 'role_') === 0) {
                    $roleId = (int) substr($role, 5);
                    $rolesUsers = Roles_user::firstOrNew(
                        ['users_id' => $user->id, 'roles_id' => $roleId]);
                    if ($roleValue === 'true') {
                        $rolesUsers->save();
                    } else {
                        Roles_user::where('users_id', $user->id)->where('roles_id', $roleId)->delete();
                    }
                }


//                if (strpos($role, 'role_') === 0 && $roleValue === 'true') {
//                    $roleId = (int) substr($role, 5);
//                    $rolesUsers = new Roles_user();
//                    $rolesUsers->users_id = $user->id;
//                    $rolesUsers->roles_id = $roleId;
//                    $rolesUsers->save();
//                }


            }
            return json_encode('success');
        }
        header('Location: /');
    }

    public function adminNumComments()
    {
        if (isUserRole('administrator') !== false || isUserRole('moderator') !== false) {
            return json_encode(Comment::where('is_moderated', '=', 0)->count());
        }
        header('Location: /');
    }

    public function adminGetComments($isModerated = null)
    {
        if (isUserRole('administrator') !== false || isUserRole('moderator') !== false) {
            return Comment::select('comments.id', 'comment', 'create_date', 'is_moderated', 'users.name', 'posts.header')
                ->leftJoin('users', 'comments.users_id', '=', 'users.id')
                ->leftJoin('posts', 'comments.posts_id', '=', 'posts.id')
                ->where(function (Builder $query) use ($isModerated) {
                    if (isset($isModerated)) {
                        return $query->where('is_moderated', '=', $isModerated);
                    }
                    return $query;
                })
                ->paginate(5); //TODO: Сделать через конфиг-файл!
        }
        header('Location: /');
    }

    public function adminApproveComment()
    {
        if (isUserRole('administrator') !== false || isUserRole('moderator') !== false) {
            $id = (int) $_POST['comment_id'] ?? 0;
            $comment = Comment::find($id);
            $comment->is_moderated = 1;
            $comment->save();
            return json_encode('success');
        }
        header('Location: /');
    }

    public function adminDeleteComment()
    {
        if (isUserRole('administrator') !== false || isUserRole('moderator') !== false) {
            $id = (int) $_POST['comment_id'] ?? 0;
            Comment::destroy($id);
            return json_encode('success');
        }
        header('Location: /');
    }


}