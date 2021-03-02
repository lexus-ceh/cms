<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/basic/header.php';
//echo '<pre>';
//var_dump(\App\Model\User::where('id', '>=', '1')->paginate(3));
//echo '</pre>';
?>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-lg-3 blog-header-logo text-dark w-auto">
                Регистрация
            </div>
        </div>
        <form class="g-3 needs-validation" method="post" action="/auth/registration" novalidate>
            <div class="row justify-content-center mb-4">
                <label for="validation-name" class="col-sm-3 col-form-label col-form-label-lg">Имя и фамилия:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-lg" id="validation-name" name="name" placeholder="Введите имя и фамилию" required>
                    <div class="invalid-feedback">
                        Пожалуйста введите имя и фамилию
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-4">
                <label for="validation-email" class="col-sm-3 col-form-label col-form-label-lg">Электронная почта:</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control form-control-lg" id="validation-email" name="email" placeholder="Введите email" required>
                    <div class="invalid-feedback">
                        Пожалуйста введите email
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-4">
                <label for="validation-password" class="col-sm-3 col-form-label col-form-label-lg">Пароль:</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control form-control-lg" id="validation-password" name="password" placeholder="Введите пароль" required>
                    <div class="invalid-feedback">
                        Пожалуйста введите пароль
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-4">
                <label for="validation-password-conf" class="col-sm-3 col-form-label col-form-label-lg">Подтверждение пароля:</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control form-control-lg" id="validation-password-conf" name="password-conf" oninput="validation_conf(this)" placeholder="Подтвердите пароль" required>
                    <div class="invalid-feedback">
                        Пароли не совпадают!
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-4">
                <label for="invalidCheck" class="col-sm-3 col-form-label col-form-label-lg"></label>
                <div class="col-sm-6">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Cогласен с <a href="/pages/rules">правилами</a> сайта
                    </label>
                    <div class="invalid-feedback">
                        Вы должны быть согласны с правилами сайта перед регистрацией!
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="w-auto">
                    <p class="text-danger"><strong><?= $data['error'] ?? ''?></strong></p>
                </div>
            </div>

            <div class="row justify-content-center mb-4">
                <button class="btn btn-dark col-lg-2" type="submit">Зарегистрироваться</button>
            </div>

        </form>
    </div>

    <script src="/js/validation.js"></script>

<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/basic/footer.php';
?>