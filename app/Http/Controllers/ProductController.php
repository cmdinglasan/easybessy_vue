<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Inertia\Inertia;

class ProductController extends Controller
{
    
    public function __invoke(Request $request)
    {
    	return Product::all();
    }

    public function index(Request $request)
    {
    	$products = Product::all();
    	$productCategories = ProductCategory::all();

    	return Inertia::render('Dashboard/Inventory/Products/Index',[
    		'products' => $products,
    		'categories' => $productCategories,
    	]);
    }

    public function store(Request $request)
    {
		$products = Product::all();

    	$request->validate([
    		'name' => 'required',
    		'category_id' => 'required',
    		'price' => 'required',
    	]);

    	Product::create([
    		'name' => $request->name,
    		'category_id' => $request->category_id,
    		'price' => $request->price,
    	]);

        return redirect()->back();
    }
}
