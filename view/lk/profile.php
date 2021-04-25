<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/header.php';
?>

<div class="container">
    <div class="card mb-3">
        <div class="row g-0 justify-content-center">
            <div class="col-md-2 pt-3">
                <img class="rounded-circle" src="<?= $data->avatar ?>" height="200" width="200" alt="Avatar">
            </div>
            <div class="col-md-10">
                <div class="card-body">
                    <h5 class="card-title">Профиль пользователя</h5>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $data->email ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputName" class="col-sm-2 col-form-label">Имя:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="inputName" value="<?= $data->name?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Новый пароль:</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="confirmPassword" class="col-sm-2 col-form-label">Повторите пароль:</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="confirmPassword">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="btn-subscribe" class="col-sm-2 col-form-label">Подписка:</label>
                        <div class="col-sm-5">
<!--                            <input type="button" class="form-control" id="subscribeButton">-->
                            <button id="btn-subscribe" type="button" class="btn <?= !isSubscriber() ? 'btn-danger' : 'btn-outline-secondary'?> col-6"><?= !isSubscriber() ? 'Подписаться' : 'Отменить подписку'?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-0 mb-3">
            <div class="col-md-2">
            </div>
            <div class="col-md-10 px-3">
                <div class="form-floating">
                    <textarea class="form-control col-8" id="aboutTextarea"><?= $data->about?></textarea>
                    <label for="aboutTextarea">О себе:</label>
                </div>
            </div>
        </div>
        <div class="row g-0 justify-content-center mb-3">
            <button type="button" class="btn btn-dark col-2">Сохранить</button>
        </div>
<!--        <div class="row g-0 justify-content-center mb-3">-->
<!--            <button id="btn-subscribe" type="button" class="btn btn-dark col-2">Подписаться</button>-->
<!--        </div>-->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="/js/subscribe.js"></script>
<script src="/js/profile.js"></script>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/basic/footer.php';
?>
