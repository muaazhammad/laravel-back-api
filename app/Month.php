<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    //
    protected $fillable=['name','start_date','end_date','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
