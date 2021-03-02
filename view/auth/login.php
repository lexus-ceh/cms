<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/basic/header.php';
?>
<body>

<form action="/auth/login" method="post">
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-lg-3 blog-header-logo text-dark w-auto">
                Авторизация
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 mb-lg-3">
                <input class="form-control form-control-lg" type="email" name="email" placeholder="Введите email">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 mb-lg-3">
                <input class="form-control form-control-lg" type="password" name="password" placeholder="Введите пароль">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="w-auto">
                <p class="text-danger"><strong><?= $data['error'] ?? ''?></strong></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="w-auto">
                <input type="submit" name="signin" value="Авторизоваться" class="btn btn-dark form-control-lg">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="mb-lg-3 w-auto">
                <a href="/auth/registration" class="btn btn-link">Регистрация</a>
            </div>
        </div>
    </div>
</form>






<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/basic/footer.php';
?>