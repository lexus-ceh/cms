<?php

namespace App\Controller;

use App\Model\Comment;
use App\Model\Post;
use App\Validation\UserAuthorizationValidation;

class Controller
{
    public function index()
    {
        $posts = Post::all();
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
}