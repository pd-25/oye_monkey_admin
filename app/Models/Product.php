<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'slug', 'title', 'price', 'discount_price','short_desc','description', 'weight', 'dimension', 'faqs', 'status', 'tag', 'meta_data'];

    public function productImages() {
        return  $this->hasMany(ProductImage::class, 'product_id', 'id'); 
    }

    public function category () {
        return  $this->belongsTo(Category::class, 'category_id', 'id'); 
    }

    public function previewImage() {
        return $this->hasOne(ProductImage::class)->latest('id');
    }


}
