<?php


namespace App\Controller;

use App\Model\Comment;
use App\Model\Roles;
use App\Model\Roles_user;
use App\Model\User;
use Illuminate\Database\Eloquent\Builder;


class AdminController
{
    public function admin()
    {
        if (isUserRole('administrator') !== false || isUserRole('moderator') !== false) {
            return view('admin.admin', ['title' => 'ADMIN PANEL']);
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
            return json_encode(($query
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
                ->get()));
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

    public function adminAllComments()
    {
        if (isUserRole('administrator') !== false || isUserRole('moderator') !== false) {
            return json_encode(Comment::select('comments.id', 'comment', 'create_date', 'is_moderated', 'users.name', 'posts.header')
                ->leftJoin('users', 'comments.users_id', '=', 'users.id')
                ->leftJoin('posts', 'comments.posts_id', '=', 'posts.id')
                ->where(function (Builder $query) {
                    if (isset($_POST['type']) && $_POST['type'] == 1) {
                        return $query->where('is_moderated', '=', 0);
                    }
                    return $query;
                })
                ->get()
            );
        }
        header('Location: /');
    }

}