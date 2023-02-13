<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = ['user_id','name','email','type','inquiry'];
    protected $table='information';

}
