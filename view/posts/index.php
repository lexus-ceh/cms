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


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/footer.php';
?>
