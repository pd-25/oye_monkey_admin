<?php

namespace App\Core\category;

interface CategoryInterface {
    public function allCategories();
    public function findCategory($slug);
    public function updateCategory($cate_data, $slug);
    public function createCategory($cate_data);
    public function deleteCategory($slug);
    
    
    
}