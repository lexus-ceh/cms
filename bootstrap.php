<?php

session_start();

define('APP_DIR', $_SERVER['DOCUMENT_ROOT'] . '/');
define('VIEW_DIR', $_SERVER['DOCUMENT_ROOT'] . '/view/');

require_once APP_DIR . 'helpers.php';

require_once __DIR__ . '/vendor/autoload.php';
