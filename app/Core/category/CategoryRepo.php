<?php

namespace App\Core\category;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryRepo implements CategoryInterface
{

    public function allCategories()
    {
        return Category::orderBy('id', 'DESC')->get();
    }

    public function findCategory($slug)
    {
        return Category::where('slug', $slug)->first();
    }

    public function updateCategory($cate_data, $slug)
    {
        try {
            $category = Category::where('slug', $slug)->first();
            if ($category) {
                $update = $category->update($cate_data);
                if ($update) {
                    return 'Data Updated Successfully.';
                } else {
                    return 'Some error occur! try again';
                }
            } else {
                return 'No category found';
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function createCategory($cate_data) {
        $slug = Str::slug($cate_data['name']);
        $slug_count = Category::where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = $slug . '-' . sha1(1234);
        }
        $cate_data['slug'] = $slug;
        return Category::create($cate_data);
    }

    public function deleteCategory($slug){
        return Category::where('slug', $slug)->delete();
    }
}
