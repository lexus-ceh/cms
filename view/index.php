<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/header.php';


// echo '<h3>Это шаблон view/index.php</h3>';

// echo $data['title'] ?? '';

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


            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>

        </div>

        <div class="col-md-4">
            <div class="p-4 mb-3 bg-light rounded">
                <h4 class="font-italic">Подписка</h4>
                <div class="mb-3">
                    <label for="email">Важные события и обновления:</label>
                    <input type="email" class="form-control" name="email" id="email" value="" placeholder="Введите свой email" />
                </div>
                <div class="row justify-content-center">
                    <input type="submit" value="Подписаться" id="subscribe" name="subscribe" class="btn btn-dark col-4" />
                </div>
            </div>

            <div class="p-4 mb-3 bg-light rounded">
                <h4 class="font-italic">Поиск по сайту</h4>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </div>

            </div>

            <div class="p-4">
                <h4 class="font-italic">Поиск по сайту ???</h4>
                <ol class="list-unstyled mb-0">
                    <li><a href="#">March 2014</a></li>
                    <li><a href="#">February 2014</a></li>
                    <li><a href="#">January 2014</a></li>
                </ol>
            </div>

            <div class="p-4">
                <h4 class="font-italic">Мы в соцсетях</h4>
                <ol class="list-unstyled">
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                </ol>
            </div>
        </div>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/footer.php';
?>
