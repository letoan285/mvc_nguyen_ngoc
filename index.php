<?php 
require_once "vendor/autoload.php";

use App\Controller\HomeController;
use App\Controller\ProductController;

// require_once "app/controllers/HomeController.php";
// require_once "app/controllers/ProductController.php";

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
        
    default: 
        echo '404 not found';
        break;
}

