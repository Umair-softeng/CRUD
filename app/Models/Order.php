<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $primaryKey = 'orderID';
    protected $fillable = ['productID', 'date', 'quantity'];

    public function product(){
        return $this->belongsTo('App\Models\Product', 'productID', 'productID');
    }

}
