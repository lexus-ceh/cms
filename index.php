<?php

use App\Application;
use App\Controller\Controller;
use App\Controller\UserController;
use App\Controller\AdminController;
use App\Controller\PostsController;
use App\Controller\PagesController;
use App\Model\Book;
use App\Router;

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$router = new Router();

$router->get('/', Controller::class . '@index');

$router->get('/auth/login', UserController::class . '@login');

$router->post('/auth/login', UserController::class . '@authLogin');

$router->get('/auth/signout', UserController::class . '@signOut');

$router->get('/auth/registration', UserController::class . '@registration');

$router->post('/auth/registration', UserController::class . '@authRegistration');

$router->get('/posts/*', PostsController::class . '@posts');

$router->post('/posts/*/add_comment', PostsController::class . '@addComment');

$router->get('/admin', AdminController::class . '@admin');

$router->get('/pages/*', PagesController::class . '@pages');

// =============== API =====================

$router->post('/admin/api/users', AdminController::class . '@adminAllUsers');
$router->post('/admin/api/roles', AdminController::class . '@adminAllRoles');
$router->post('/admin/api/user-change', AdminController::class . '@adminUserChange');
$router->post('/admin/api/num-comments', AdminController::class . '@adminNumComments');
$router->post('/admin/api/comments', AdminController::class . '@adminAllComments');

// ==============================================================

$router->get('/test-pagination', Controller::class . '@testPagination');
$router->get('/test-tabs', Controller::class . '@testTabs');

$router->get('/personal/messages/show', function () {
    return view('personal.messages.show', ['title' => 'Show Page']);
});

$router->get('/pricing', function () {
    return view('pricing');
});

$router->get('/about/contacts', function () {
    return view('about.contacts', ['title' => 'Our contacts']);
});

$router->get('/about', Controller::class . '@about');

$router->post('/auth', Controller::class . '@auth');

$router->get('/auth/auth', Controller::class . '@auth');

//$router->get( '/test/*/test2/*', function ($param1, $param2) {
//    return "Test page with param1=$param1 param2=$param2" ;
//});

$router->get( '/*/test1/*/test2/*/test3', function ($param1, $param2, $param3) {
    return "Test page with param1=$param1 param2=$param2 param3=$param3" ;
});

$router->get( '/book/all', function () {
    $data = Book::all();
    return view('book.all', $data);
});

$router->get('/debug_design', function () {
    return view('debug_design');
});

$application = new Application($router);

$application->run();


