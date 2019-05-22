<?php 
namespace App\Controller;
use App\Model\Product;
use App\Model\User;
use App\Model\Category;

class ProductController extends BaseController {
    public function __construct()
    {
        $this->base_url = 'http://localhost/hvcg/2019/nguyen_ngoc/oop_mvc/';

        if(!$_SESSION['auth'] || $_SESSION['auth'] == null){
            header('location: '.$this->base_url.'login');
        }
    }
    public function index()
    {
        $path = "";
        $products = Product::all();
        $view = "app/views/products/index.php";
        include_once "app/views/layouts/master.php";
    }
    public function show()
    {
        $id = $_GET['id'];
        $product = Product::find($id);
        var_dump($product);die;
        include_once "app/views/products/show.php";
    }
    public function create()
    {
        $path = "../";
        $users = User::all();
        $categories = Category::all();
        $view = "app/views/products/create.php";
        include_once "app/views/layouts/master.php";
    }
    public function store()
    {
        $product = new Product();
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];
        $product->description = $_POST['description'];
        $product->category_id = $_POST['category_id'];
        $product->user_id = $_POST['user_id'];
        $product->status = $_POST['status'];
        $product->stock = $_POST['stock'];
        $product->short_description = $_POST['short_description'];
        $product->avatar = 'avatar.php';

        $product->save();
        header("location: ".$this->base_url."products");
    }
    public function edit()
    {
        dd('edit');
    }
    // public function getCateName($cateId) {
    //     dd($cateId);
    // }
}