<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BranchCart;
use App\Models\BranchCartItem;
use App\Models\Product;
use App\Models\ProductCategory;
use Inertia\Inertia;

class CartController extends Controller
{

	public function index(Request $request)
	{
		$carts = BranchCart::all();
		$cartItems = BranchCartItem::all();
        $cartCount = count($cartItems);
		$products = Product::all();
    	$productCategories = ProductCategory::all();

    	return response()->json([
    		'products' => $products,
    		'categories' => $productCategories,
    		'carts' => $carts,
    		'cartCount' => $cartCount,
    		'cartItems' => $cartItems,
    	]);
	}

    public function store(Request $request)
    {
        $carts = BranchCart::all();
		$products = Product::all();
    	$productCategories = ProductCategory::all();

    	$request->validate([
    		'id' => 'required',
    		'quantity' => 'required',
    	]);

    	$item = BranchCartItem::where('product_id', $request->id)->first();

    	if($item && $cart = BranchCart::where('id', $item->cart_id)->first()) {
    		$item->quantity += $request->quantity;
    		$item->save();

    		$cart->cart_price += $request->price * $request->quantity;
    		$cart->save();
    	} else {
	    	$cartItem = new BranchCartItem;
	    	$cartItem->cart_id = 1;
	    	$cartItem->product_id = $request->id;
	    	$cartItem->quantity = $request->quantity;
	    	$cartItem->save();

	    	$cart = BranchCart::where('id', $cartItem->cart_id)->first();
	    	$cart->cart_price += $request->price * $request->quantity;
	    	$cart->save();
    	}

		$cartItems = BranchCartItem::all();
        $cartCount = count($cartItems);

    	return redirect()->route('pos', [
    		'products' => $products,
    		'categories' => $productCategories,
    		'carts' => $carts,
    		'cartCount' => $cartCount,
    		'cartItems' => $cartItems,
    	]);

    }

    public function destroy(Request $request)
    {

    	$request->validate([
    		'name' => 'required',
    	]);

    	$id = $request->name;

        $item = BranchCartItem::find($id);
		$product = Product::where('id', $item->product_id)->first();

        $cart = BranchCart::where('id', $item->cart_id)->first();
        $cart->cart_price -= $item->quantity * $product->price;
        $cart->save();

        $item->delete();

        $carts = BranchCart::all();
    	$cartItems = BranchCartItem::all();
        $cartCount = count($cartItems);

        return redirect()->route('pos', [
        	'carts' => $carts,
    		'cartCount' => $cartCount,
    		'cartItems' => $cartItems,
    	]);

    }

}
