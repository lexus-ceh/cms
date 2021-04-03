<?php

namespace App;

class AdminMenu
{
    private $menu = [];

    public function __construct() {
        $this->menu = include $_SERVER['DOCUMENT_ROOT'] . '/configs/admin-menu.php';
    }

    public function getMenu() {
        return $this->menu;
    }

    public function getTitle($param) {
        foreach($this->menu as $chapter ) {
            foreach($chapter['content'] as $item) {
                if($item['link'] == '/admin2/' . $param) {
                    return $chapter['title'] . ' / ' . $item['title'];
                }
            }
        }
    }
}