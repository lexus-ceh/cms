<?php

namespace App\Controller;

use App\Factory\PaginatorFactory;
use App\Model\Comment;
use App\Model\Post;
use App\Validation\UserAuthorizationValidation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class Controller
{
    public function index()
    {
        // $posts = Post::all();
        LengthAwarePaginator::currentPageResolver(function ($pageName) {
            return $_GET[$pageName] ?? '1';
        });

        LengthAwarePaginator::currentPathResolver(function () {
            return explode('?', $_SERVER['REQUEST_URI'])[0];
        });

        LengthAwarePaginator::viewFactoryResolver(function () {
            return new PaginatorFactory();
        });
        $posts = Post::paginate(3);
        return view('index', $posts);
    }

    // ======================================================

    public function about()
    {
        return '<font color="red"><b>about</b></font>';
    }

    public function auth()
    {
        return view('auth');
    }

    public function testPagination()
    {
        return view('test-pagination');
    }

    public function testTabs()
    {
        return view('test-tabs');
    }

    public function testAccordion()
    {
        $comments = Comment::select('comments.id', 'comment', 'create_date', 'is_moderated', 'users.name', 'posts.header')
            ->leftJoin('users', 'comments.users_id', '=', 'users.id')
            ->leftJoin('posts', 'comments.posts_id', '=', 'posts.id')
            ->orderBy('create_date', 'DESC')
            ->get();
        return view('test-accordion', $comments);
    }
}