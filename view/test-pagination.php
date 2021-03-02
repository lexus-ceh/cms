<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/header.php';

\Illuminate\Pagination\LengthAwarePaginator::currentPageResolver(function ($pageName) {
    return $_GET[$pageName] ?? '1';
});

\Illuminate\Pagination\LengthAwarePaginator::currentPathResolver(function () {
    return explode('?', $_SERVER['REQUEST_URI'])[0];
});

\Illuminate\Pagination\LengthAwarePaginator::viewFactoryResolver(function () {
    return new App\Factory\PaginatorFactory();
});

$posts = \App\Model\Post::paginate(2);

var_dump($_GET);
var_dump(explode('?', $_SERVER['REQUEST_URI'])[0]);



var_dump($posts instanceof \Illuminate\Pagination\LengthAwarePaginator);

foreach ($posts as $post) { ?>

    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-200 position-relative">
            <div class="col p-3 d-flex flex-column position-static">
                <h5 class="mb-0"><?= substr($post->header,0, 25); ?></h5>
                <div class="mb-1 text-muted"><?= $post->date; ?></div>
                <p class="card-text mb-auto"><?= substr($post->content, 0, 90);?></p>
                <a href="/posts/<?= $post->id;?>" class="stretched-link">Читать далее...</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="<?= $post->img;?>" alt="Thumbnail" width="150" height="200"/>
            </div>
        </div>
    </div>

<?php
}
$posts->render('paginator');

$users = \App\Model\User::paginate(3);
foreach ($users as $user) {
    echo $user->name . '<br>';
}
$users->render('paginator');

?>
