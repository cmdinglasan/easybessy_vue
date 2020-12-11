<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'street','city','state','post_code','country','contact_number','start_time','end_time','other_info'];

    public function cashiers(){
        return $this->hasMany('App\Models\Cashier');
    }
}
