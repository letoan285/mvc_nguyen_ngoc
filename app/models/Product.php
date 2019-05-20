<?php 
namespace App\Model;

class Product extends BaseModel {
    protected $table = 'products';
    public $columns = [
            'name', 
            'slug', 
            'price', 
            'image', 
            'description', 
            'short_description', 
            'status', 
            'user_id', 
            'category_id', 
            'stock'
        ];
}