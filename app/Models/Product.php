<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'productID';
    protected $fillable = ['name', 'categoryID', 'price'];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'categoryID', 'categoryID');
    }

    public function order(){
        return $this->hasMany('App\Models\Order', 'productID', 'productID');
    }
}
