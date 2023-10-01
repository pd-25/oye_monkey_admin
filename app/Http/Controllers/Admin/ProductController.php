<?php

namespace App\Http\Controllers\Admin;

use App\Core\product\ProductInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $productInterface;
    public function __construct(ProductInterface $productInterface)
    {
      $this->productInterface = $productInterface;  
    }
   
    public function index()
    {
       $data['products'] = $this->productInterface->getAllProducts('admin');
     
       return view('admin.products.index', $data);
    }

   
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
