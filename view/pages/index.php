<?php

use App\Exception\NotFoundException;

require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/header.php';

$file = APP_DIR . 'pages/' . addslashes($data) . '.html';

if (file_exists($file)) {
    include $file;
} else {
    throw new NotFoundException();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/footer.php';




