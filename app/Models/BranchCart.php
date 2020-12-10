<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchCart extends Model
{
    use HasFactory;

    protected $fillable = ['branch_id', 'user_id', 'cart_price'];

    public function cartItem()
    {
    	return $this->hasMany('App\Models\BranchCartItem');
    }
}
