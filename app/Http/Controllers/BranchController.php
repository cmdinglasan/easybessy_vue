<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use Inertia\Inertia;

class BranchController extends Controller
{
    public function index(Request $request)
    {
    	$branches = Branch::orderBy('name')->get();

    	return Inertia::render('Dashboard/Branches/Index',[
    		'branches' => $branches,
    	]);
    }
}
