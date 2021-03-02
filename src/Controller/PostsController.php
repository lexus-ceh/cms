<?php

namespace App\Controller;

use App\Factory\CommentFactory;
use App\Model\Comment;
use App\Model\Post;
use Illuminate\Database\Eloquent\Builder;

class PostsController
{
    public function posts($postId)
    {
        $data = Post::where('id', $postId)->get();
        $comments = Comment::select('comments.id', 'comment', 'create_date', 'is_moderated', 'users.name', 'users.avatar')
            ->leftJoin('users', 'comments.users_id', '=', 'users.id')
            ->where('posts_id', $postId)
            ->where(function (Builder $query) {
                if (!isLogined()) {
                    return $query->where('is_moderated', 1);
                } elseif (isUserRole('administrator') !== false || isUserRole('moderator') !== false) {
                    return $query;
                } else {
                    return $query->where('is_moderated', 1)
                        ->orWhere('users_id', '=', $_SESSION['id']);
                }
            })
            ->orderByDesc('create_date')
            ->get();
        $data[] = $comments;
        return view('posts.index', $data);
    }

    public function addComment($page, $comment, $submit)
    {
        //TODO: добавление комментария в БД
        //return var_dump($page, $comment, $submit);
        if (!empty($comment)) {
            CommentFactory::create([$page, $comment]);
        }
        header("Location: /posts/$page");
    }
}