<?php 
namespace App\Model;

class Category extends BaseModel {
    protected $table = 'categories';
    public function getCateName($cateId) {
        dd($cateId);
    }

}