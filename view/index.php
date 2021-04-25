<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/header.php';

?>

<main class="container">
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
            <p class="lead mb-0"><a href="/posts/1" class="text-white fw-bold">Читать далее...</a></p>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">World</strong>
                    <h3 class="mb-0">Featured post</h3>
                    <div class="mb-1 text-muted">Nov 12</div>
                    <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a href="/posts/2" class="stretched-link">Читать далее...</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-success">Design</strong>
                    <h3 class="mb-0">Post title</h3>
                    <div class="mb-1 text-muted">Nov 11</div>
                    <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a href="/posts/3" class="stretched-link">Читать далее...</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 font-italic border-bottom">
                From the Firehose
            </h3>
            <div class="row mb-2">
                <? foreach($data as $post): ?>
                <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-200 position-relative">
                    <div class="col p-3 d-flex flex-column position-static">
                        <h5 class="mb-0"><?= substr($post['header'],0, 25); ?></h5>
                        <div class="mb-1 text-muted"><?= $post['date']; ?></div>
                        <p class="card-text mb-auto"><?= substr($post['content'], 0, 90);?></p>
                        <a href="/posts/<?= $post['id'];?>" class="stretched-link">Читать далее...</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img src="<?= $post['img'];?>" alt="Thumbnail" width="150" height="200"/>
                    </div>
                </div>
                </div>
                <? endforeach;?>

<!--                <div class="col-md-6">-->
<!--                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-200 position-relative">-->
<!--                        <div class="col p-3 d-flex flex-column position-static">-->
<!--                            <h4 class="mb-0">Featured post</h4>-->
<!--                            <div class="mb-1 text-muted">Nov 12</div>-->
<!--                            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to ...</p>-->
<!--                            <a href="#" class="stretched-link">Continue reading</a>-->
<!--                        </div>-->
<!--                        <div class="col-auto d-none d-lg-block">-->
<!--                            <svg class="bd-placeholder-img" width="150" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

            </div>

            <? $data->render('paginator-posts'); ?>

        </div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/footer.php';
?>
