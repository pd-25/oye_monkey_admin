<?php
namespace App\Core\product;

use App\Models\Product;

class ProductRepository implements ProductInterface {
    public function getAllProducts($role=null){
       if ($role == 'admin') {
            return Product::with(['category', 'previewImage'])->get();
       }
       return Product::with('productImages','category')->where('status', 'Available')->orWhere('status', 'Out of Stock')->get();
    }
}

