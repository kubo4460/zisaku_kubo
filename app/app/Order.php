<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'quantity', 'price', 'size',
    ];
    protected $table = 'orders';

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function products()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }
}
