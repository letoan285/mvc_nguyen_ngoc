<?php 
namespace App\Controller;
use App\Model\Product;
use App\Model\User;
use App\Model\Category;

class UserController extends BaseController {
    
    public function index()
    {
        dd('usercontroller->index');
    }
    public function show()
    {

    }
    public function create()
    {

    }
    public function store()
    {

    }
    public function getLogin() {
        include_once "app/views/users/login.php";
    }
    public function postLogin() {
        $password_login = $_POST['password'];
        $email_login = $_POST['email'];

        $user = User::where(['email', $email_login])->first();

        if(!$user){
            header('location: login');
        }
        if( password_verify($password_login, $user->password) ) {
            $_SESSION['auth']['username'] = $user->username;
            $_SESSION['auth']['email'] = $user->email;
            $_SESSION['auth']['password'] = $user->password;
            header('location: products');
        } else {
            header('location: login');
        }
        
        $userLogin = new User();
        $userLogin->username = $_POST['username'];
        $userLogin->password = $_POST['password'];
        $userLogin->username = $_POST['username'];
        $userLogin->username = $_POST['username'];
    }
    public function postSignup() {
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        if($password != $password_confirm) {
            header('location: signup');
        } else {
            $user = new User();
            $user->username = $_POST['username'];
            $user->password = password_hash($password, PASSWORD_DEFAULT);
            $user->email = $_POST['email'];
            $user->save();
            header('location: login');
        }
 
    }
    public function getSignup()
    {
        include_once "app/views/users/signup.php";
    }
    public function logout()
    {
        unset($_SESSION['auth']);
        header('location: login');
    }
}