<?php


namespace App\Controller;


class PagesController
{
    public function pages($namePage)
    {
        return view('pages.index', $namePage);
    }
}