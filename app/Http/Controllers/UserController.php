<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CurrentUserResource;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function showCurrent(Request $request)
    {
    	$currentUser = Auth::user();

    	$user = array(
    		'name' => $currentUser->name,
    		'email' => $currentUser->email,
    		'image' => $currentUser->profile_photo_url,
    	);

    	return $user;
    }

    public function index(Request $request)
    {
        $users = User::orderBy('name')->get();

        return Inertia::render('Dashboard/UserManagement/Index',[
            'users' => $users,
        ]);

    }
}
