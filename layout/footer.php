
<div class="col-md-4">
    <? if (!isSubscriber()): ?>
    <form id="formSubscribe" class="g-3 needs-validation" method="post" action="#" novalidate>
        <div class="p-4 mb-3 bg-light rounded">
            <h4 class="font-italic">Подписка</h4>
            <div class="mb-3">
                <label for="email">Важные события и обновления:</label>
                <input type="email" class="form-control" name="email" id="email" <?= isLogined() ? 'readonly' : ''?> value="<?= isLogined() ? $_SESSION['email'] : ''?>" placeholder="Введите свой email" required />
                <div class="invalid-feedback">
                    Пожалуйста введите корректный email
                </div>
                <div class="valid-feedback">
                    Подписка оформлена!
                </div>
            </div>
            <div class="row justify-content-center">
                <input type="submit" value="Подписаться" id="subscribe" name="subscribe" class="btn btn-dark col-4" />
            </div>
        </div>
    </form>
    <? endif; ?>

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
        <h4 class="font-italic">Архив</h4>
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



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="/js/subscribe.js"></script>
<script src="/js/validation.js"></script>
<script src="/js/main.js"></script>

<?php

require_once 'basic/footer.php';

?>


