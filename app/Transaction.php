<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable=['price','product_id','user_id','supplier_id','month_id','quantity','date'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    public function month()
    {
        return $this->belongsTo('App\Month');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
