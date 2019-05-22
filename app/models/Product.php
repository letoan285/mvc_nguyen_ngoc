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
        public function getCateName($cateId) {
            $product = self::find($cateId);
            if($product){
                return $product->name;
            } else {
                return 'khong danh muc';
            }
        }
}