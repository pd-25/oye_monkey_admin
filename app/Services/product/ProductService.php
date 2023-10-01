<?php
namespace App\Services\product;

use App\Core\product\ProductInterface;
use App\Core\product\ProductRepository;
use Illuminate\Support\ServiceProvider;

final class ProductService extends ServiceProvider
{
    public function register() {
        $this->app->bind(ProductInterface::class, ProductRepository::class);
    }
}
