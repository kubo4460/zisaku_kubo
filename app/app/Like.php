<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }

    public function like_exist($user_id,$product_id)
    {
        return $this->where('user_id',$user_id)->where('product_id',$product_id)->exists();
    }

}
