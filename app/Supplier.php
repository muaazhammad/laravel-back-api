<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $fillable=['name','phone_number','user_id'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
