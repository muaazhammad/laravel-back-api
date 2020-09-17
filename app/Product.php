<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
protected $fillable=['name','price','user_id','supplier_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

}
