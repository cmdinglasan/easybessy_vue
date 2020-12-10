<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $guarded = [];

    protected $fillable = [
        'name', 'description', 'category_id', '	image', 'price', 'stock_qty', 'minimum_stock'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'product_category_id')->withTrashed();
    }

    public function branchCartItem()
    {
        return $this->belongsTo('App\Models\BranchCartItem', 'product_id');
    }

    public function solds()
    {
        return $this->hasMany('App\Models\SoldProduct');
    }
}
