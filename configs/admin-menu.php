<?php

$adminMenu = [
    [
        'title' => 'Статьи',
        'access' => 'administrator.moderator',
        'content' => [
            [
                'title' => 'Создать статью',
                'link' => '/admin2/newpost',
                'data-feather' => 'file',
            ],
            [
                'title' => 'Управление статьями',
                'link' => '/admin2/editpost',
                'data-feather' => 'edit-3',
            ],
        ],
    ],
    [
        'title' => 'Страницы',
        'access' => 'administrator.moderator',
        'content' => [
            [
                'title' => 'Создать страницу',
                'link' => '/admin2/newpage',
                'data-feather' => 'file-plus',
            ],
            [
                'title' => 'Управление страницами',
                'link' => '/admin2/editpage',
                'data-feather' => 'edit',
            ],
        ],
    ],
    [
        'title' => 'Комментарии',
        'access' => 'administrator.moderator',
        'content' => [
            [
                'title' => 'Все',
                'link' => '/admin2/allcomments',
                'data-feather' => 'message-square',
            ],
            [
                'title' => 'Ожидают проверки',
                'link' => '/admin2/unapprovedcomments',
                'data-feather' => 'alert-triangle',
            ],
        ],
    ],
    [
        'title' => 'Пользователи',
        'access' => 'administrator',
        'content' => [
            [
                'title' => 'Менеджер пользователей',
                'link' => '/admin2/users',
                'data-feather' => 'users',
            ],
        ],
    ],
    [
        'title' => 'Подписки',
        'access' => 'administrator',
        'content' => [
            [
                'title' => 'Менеджер подписок',
                'link' => '/admin2/subscribers',
                'data-feather' => 'bell',
            ],
        ],
    ],
    [
        'title' => 'Настройки',
        'access' => 'administrator',
        'content' => [
            [
                'title' => 'Общие настройки',
                'link' => '/admin2/settings',
                'data-feather' => 'settings',
            ],
        ],
    ],
];

return $adminMenu;


