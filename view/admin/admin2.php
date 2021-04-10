<?php

use App\Exception\ItemNotFoundException;
use App\Exception\NotFoundException;

require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/admin_header.php';
$adminMenuObj = new \App\AdminMenu();
$adminMenu = $adminMenuObj->getMenu();

?>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <? foreach($adminMenu as $chapter): ?>
                    <? if(in_array(0, array_map('isUserRole', explode('.', $chapter['access'])), true)): ?>
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span><?= $chapter['title']; ?></span>
                        </h6>
                        <ul class="nav flex-column">
                            <? foreach($chapter['content'] as $item): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?= explode('/', $item['link'])[2] == $data[0] ? 'active' : '' ?>" href="<?= $item['link'] ?>">
                                        <span data-feather="<?= $item['data-feather'] ?>"></span>
                                        <?= $item['title'] ?> <?= $item['title'] === 'Ожидают проверки'? '<span class="badge bg-primary" id="comment-badge"></span>' : ''?>
                                    </a>
                                </li>
                            <? endforeach; ?>
                        </ul>
                    <? endif; ?>
                <? endforeach; ?>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 id="adminPanelHeader" class="h2" ><?= $adminMenuObj->getTitle($data[0]); ?></h1>
            </div>
            <div id="admin-content">
                <?php
                    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/view/admin/items/' . $data[0] . '.php')) {
                        throw new ItemNotFoundException();
                    } else {
                        view('admin.items.' . $data[0], $data[1] ?? '')->render();
                    }
                ?>
            </div>
        </main>
    </div>
</div>


<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/admin_footer.php';
?>
