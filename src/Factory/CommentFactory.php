<?php


namespace App\Factory;


use App\Model\Comment;

class CommentFactory implements Factory
{

    public static function create(array $data)
    {
        // TODO: Implement create() method.
        $comment = new Comment();
        $comment->posts_id = $data[0];
        $comment->comment = $data[1];
        $comment->users_id = $_SESSION['id'];
        $comment->is_moderated = (isUserRole('administrator') !== false || isUserRole('moderator')) !== false ? 1 : 0;
        $comment->parent_id = 0;
        $comment->save();
    }
}