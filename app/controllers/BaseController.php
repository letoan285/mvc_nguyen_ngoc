<?php 
namespace App\Controller;

class BaseController {
    public function __construct()
    {
        $this->base_url = 'http://localhost/hvcg/2019/nguyen_ngoc/oop_mvc/';
    }
}
