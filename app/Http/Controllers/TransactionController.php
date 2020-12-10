<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BranchCart;
use App\Models\BranchCartItem;
use App\Models\Product;
use App\Models\ProductCategory;
use Inertia\Inertia;

class TransactionController extends Controller
{
    public function __invoke(Request $request)
    {
    	return Product::all();
    }

    public function index(Request $request)
    {
        $carts = BranchCart::all();
        $cartItems = BranchCartItem::all();
        $cartCount = count($cartItems);
    	$products = Product::all();
    	$productCategories = ProductCategory::all();

    	return Inertia::render('PointOfSales/Index',[
            'products' => $products,
            'categories' => $productCategories,
            'carts' => $carts,
            'cartCount' => $cartCount,
            'cartItems' => $cartItems,
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

        return redirect()->route('product.index')->with('successMessage', 'Product was successfully added!');
    }
}
