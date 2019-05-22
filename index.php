<?php 
session_start();
// define('AUTH_SESSION', 'auth');

require_once "vendor/autoload.php";
require_once 'utils/index.php';

use App\Controller\HomeController;
use App\Controller\ProductController;
use App\Controller\UserController;

$url = isset( $_GET['url'] ) ? $_GET['url'] : '/';


switch($url) {
    case '/':
        $ctl = new HomeController();
        $ctl->index();
        break;
    case 'products':
        $ctl = new ProductController();
        $ctl->index();
        break;
    case 'products/detail':
        $ctl = new ProductController();
        $ctl->show();
        break;
    case 'products/edit':
        $ctl = new ProductController();
        $ctl->edit();
        break;
    case 'products/create':
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'GET'){
            $ctl = new ProductController();
            $ctl->create();
            break;
        } else if($method == 'POST') {
            $ctl = new ProductController();
            $ctl->store();
            break;
        }
    case 'users': 
        $ctl = new UserController();
        $ctl->index();
        break;
    case 'login': 
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'GET'){
            $ctl = new UserController();
            $ctl->getLogin();
            break;
        } else if($method == 'POST') {
            $ctl = new UserController();
            $ctl->postLogin();
            break;
        }
    case 'signup': 
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'GET'){
            $ctl = new UserController();
            $ctl->getSignup();
            break;
        } else if($method == 'POST') {
            $ctl = new UserController();
            $ctl->postSignup();
            break;
        }
        break;
    case 'logout': 
        $ctl = new UserController();
        $ctl->logout();
        break;
    default: 
        echo '404 not found';
        break;
}

