<?php
namespace App\Services\category;

use App\Core\category\CategoryInterface;
use App\Core\category\CategoryRepo;
use Illuminate\Support\ServiceProvider;

final class CategoryService extends ServiceProvider
{
    public function register() {
        $this->app->bind(CategoryInterface::class, CategoryRepo::class);
    }
}
