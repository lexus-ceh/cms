<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/header.php';
?>

<main class="container">

    <div class="row">
        <div class="col-md-8">
                <article class="blog-post">
                    <h2 class="blog-post-title"><?= $data[0]['header'];?></h2>
                    <p class="blog-post-meta"><?= $data[0]['date']; ?></p>
                    <p>
                        <?= $data[0]['content'];?>
                    </p>

                </article><!-- /.blog-post -->


            <div class="card text-dark bg-light mb-3" style="max-width: 100%;">
                <div class="card-header">Комментарии</div>
                <div class="card-body">

                    <? foreach($data[1] as $comment): ?>
                    <div class="row mb-5">
                        <div class="col-1">
                            <img class="rounded-circle" src="<?= $comment['avatar']?>" width="60" height="60" alt="Ава">
                        </div>
                        <div class="col-11">
                            <p class="card-text text-primary h6"><?= $comment['name'] ?><small class="text-muted mx-3"><?= $comment['create_date']?></small></p>
                            <p class="card-text text-danger"><em><small class=""><?= $comment['is_moderated'] == 0 ? 'Ваш комментарий ожидает проверки.' : ''?></small></em></p>
                            <p class="card-text"><?= htmlspecialchars($comment['comment'])?></p>
                        </div>
                    </div>
                    <? endforeach;?>

<!--                    <div class="row mb-5">-->
<!--                        <div class="col-1">-->
<!--                            <a href="#" class="pull-left">-->
<!--                                <img class="rounded-circle" src="https://bootstraptema.ru/snippets/element/2016/comments/com-2.jpg" alt="">-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <div class="col-11">-->
<!--                            <p class="card-text text-primary h6">Алексей Горбачев<small class="text-muted mx-lg-3">11 ноября 2020 15:39</small></p>-->
<!--                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->


                    <div class="row">
                        <form method="post" action="/posts/<?=$data[0]['id']?>/add_comment">

                            <textarea class="form-control" placeholder="Оставьте Ваш комментарий" name="comment" rows="5"></textarea>
                            <br>

                            <div class="row justify-content-between">
                                <div class="col-4">
                                <? if(!isLogined()):?>
                                    <a class="btn-link" href="/auth/login"><?= isLogined() ? '' : 'Войти или зарегистрироваться'?></a>
                                <? endif; ?>
                                </div>

                                <div class="col-3" data-bs-toggle="tooltip" title="<?= !isLogined() ? 'Авторизуйтесь, чтобы отправлять комментарии!' : ''?>">
                                    <input type="submit" class="btn btn-primary col-12 <?= !isLogined() ? 'disabled' : ''?>" width="100%" name="send_comment"  value="Отправить" />
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>

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
    </div>

</main>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/footer.php';
?>
