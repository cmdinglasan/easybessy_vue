<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Stock;
use Inertia\Inertia;

class StockController extends Controller
{

	use SoftDeletes;

	public function __invoke(Request $request)
    {
    	return Stock::orderBy('id')->get();
    }

    public function index(Request $request) {
    	$products = Product::orderBy('name')->get();
    	$categories = ProductCategory::orderBy('name')->get();
    	$stocks = Stock::all();
    	$branches = Branch::orderBy('name')->get();

		return Inertia::render('Dashboard/Inventory/Stocks/Index', [
			'branches' => $branches,
			'categories' => $categories,
			'products' => $products,
			'stocks' => $stocks,
    	]);
    }

    public function sortAll(Request $request) {

    	$stocks = Stock::orderBy('id')->get();

    	return compact('stocks');
    }

    public function sort(Request $request) {

    	$branch = Branch::find($request->id);
    	$branchName = $branch->name;

    	if(isset($request->id)) {
    		$stocks = Stock::orderBy('id')->where('branch_id', $request->id)->get();
    	} else {
    		$stocks = Stock::get();
    	}

    	$requestId = $request->id;

    	return compact('stocks', 'requestId', 'branchName');
    }

    public function transfer(Request $request)
    {
    	$branchFrom = Branch::find($request->from);
    	$branchTo = Branch::find($request->to);
    	$product = Product::find($request->product);
    	$amount = $request->amount;
    	$stockFrom = Stock::where([
    		['branch_id', $request->from],
    		['product_id', $request->product],
    	])->first();
    	$stockTo = Stock::where([
    		['branch_id', $request->to],
    		['product_id', $request->product],
    	])->first();

    	if($branchFrom != $branchTo) {
	    	if($stockTo) {
	    		if($stockFrom->stock_qty >= $request->amount) {
		    		$stockFrom->stock_qty -= $request->amount;
		    		$stockFrom->save();

	    			$stockTo->stock_qty += $request->amount;
	    			$stockTo->save();
	    		} else {
	    			$error = $branchFrom->name.' doesn\'t have enough stocks';
	    			return compact('error');
	    		}

	    	} else {
	    		if($stockFrom) {
		    		$stock = new Stock;
		    		$stock->branch_id = $request->to;
		    		$stock->product_id = $request->product;
		    		$stock->stock_qty += $request->amount;
		    		$stock->minimum_stock = 0;
		    		$stockFrom->stock_qty -= $request->amount;
		    		$stockFrom->save();
		    		$stock->save();
	    		} else {
	    			$error = $branchFrom->name.' doesn\'t have that product';
	    			return compact('error');
	    		}

	    	}
	    } else {
			$error = 'Cannot transfer product with same branch';
			return compact('error');
	    }

    	return compact('stockTo');

    	$this->sortAll();
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'branch' => 'required',
    		'product' => 'required',
    		'amount' => 'required',
    	]);

    	$stock = Stock::where([
    		['branch_id', $request->branch],
    		['product_id', $request->product],
    	])->first();

    	if(!$stock) {
    		Stock::create([
	    		'branch_id' => $request->branch,
	    		'product_id' => $request->product,
	    		'stock_qty' => $request->amount,
    		]);
	    	return compact('stocks');
    	} else {
    		$stock->stock_qty += $request->amount;
    		$stock->save();
	    	return response()->json(['error' => 'Added '. $request->amount. ' products with id' . $request->product]);
    	}

		return response()->json(['error' => 'Product already added']);

    }

}
