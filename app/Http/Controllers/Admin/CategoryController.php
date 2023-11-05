<?php

namespace App\Http\Controllers\Admin;

use App\Core\category\CategoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryInterface;
    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }

    public function index()
    {
        $data['categories'] = $this->categoryInterface->allCategories();
        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'meta_data' => 'required|string|max:500',
        ]);

        $cat_data = $request->only('name', 'meta_data');
        $data = $this->categoryInterface->createCategory($cat_data);
        if ($data) {
            return redirect()->route('categories.index')->with('msg', 'New Category Inserted.');
        } else {
            return back()->with('msg', 'Some error occur!, try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $slug = decrypt($slug);
        $data['category'] = $this->categoryInterface->findCategory($slug);
        return view('admin.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'meta_data' => 'required|string|max:500',
        ]);
        try {
            $slug = decrypt($slug);
            $cat_data = $request->only('name', 'meta_data');
            $data = $this->categoryInterface->updateCategory($cat_data, $slug);
            return back()->with('msg', $data);
        } catch (\Throwable $th) {
            return back()->with('msg', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        try {
            $slug = decrypt($slug);
            if ($this->categoryInterface->deleteCategory($slug)) {
                return back()->with('msg', 'The category has been deleted successfully.');
            } else {
                return back()->with('msg', 'Some error occur! try again.');
            }
        } catch (\Throwable $th) {
            throw $th;
            return back()->with('msg', $th->getMessage());
        }
    }
}
