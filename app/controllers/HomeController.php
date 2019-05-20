<?php 
namespace App\Controller;
use App\Model\Product;

class HomeController extends BaseController {
    public function index()
    {
        $products = Product::all();
        include_once "app/views/index.php";
    }
}