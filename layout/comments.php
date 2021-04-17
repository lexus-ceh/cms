<?php
?>

<div class="container mb-3">
    <div class="accordion mb-3" id="accordionExample">
        <? foreach ($data as $comment): ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$comment['id']?>" aria-expanded="false" aria-controls="collapse<?=$comment['id']?>">
                        <div class="container-fluid">
                            <div class="row justify-content-start">
                                <div class="col-4 align-self-center">
                                    <p class="text-primary m-0"><?= $comment['name'] ?><small class="text-muted mx-3"><?= $comment['create_date']?></small></p>
                                </div>
                                <div class="col">

                                </div>
                                <? if ($comment['is_moderated'] == 0):?>
                                <div class="col-1 p-0">
                                    <a href="#" type="button" class="btn-close btn-close-green justify-content-end" onclick="approveComment(<?=$comment['id']?>)" aria-label="Approve"></a>
                                </div>
                                <? endif; ?>
                                <div class="col-1 p-0">
                                    <a href="#" type="button" class="btn-close btn-close-red justify-content-end" onclick="deleteComment(<?=$comment['id']?>)" aria-label="Delete"></a>
                                </div>
                            </div>
                        </div>
                    </button>
                </h2>
                <div id="collapse<?=$comment['id']?>" class="accordion-collapse collapse justify-content-center" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body col-10">
                        <?= htmlspecialchars($comment['comment']);?>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
    <? $data->render('paginator'); ?>
</div>

<script src="/js/accordion.js"></script>
<script>launchAccording()</script>
