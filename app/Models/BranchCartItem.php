<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchCartItem extends Model
{
    use HasFactory;

    protected $fillable = ['cart_id', 'product_id', 'quantity'];

    public function cart()
    {
    	return $this->belongsTo('App\Models\BranchCart');
    }
    public function products()
    {
    	return $this->hasMany('App\Models\Product');
    }
}
