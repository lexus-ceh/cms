<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/header.php';
?>
<div class="container">
<div class="accordion" id="accordionExample">
    <? foreach ($data as $comment): ?>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <div class="container-fluid">
                    <div class="row justify-content-start">
                        <div class="col-4 align-self-center">
                            <p class="text-primary m-0"><?= $comment['name'] ?><small class="text-muted mx-3"><?= $comment['create_date']?></small></p>
                        </div>
                        <div class="col">

                        </div>
                        <div class="col-1 p-0">
                            <a href="#" type="button" class="btn-close btn-close-green justify-content-end" aria-label="Approve"></a>
                        </div>
                        <div class="col-1 p-0">
                            <a href="#" type="button" class="btn-close btn-close-red justify-content-end" aria-label="Delete"></a>
                        </div>
                    </div>
                </div>



            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <?= htmlspecialchars($comment['comment']);?>
            </div>
        </div>
    </div>
    <? endforeach; ?>
</div>
</div>

