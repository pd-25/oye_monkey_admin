<?php
namespace App\Core\product;

interface ProductInterface {
    public function getAllProducts($role=null);
}