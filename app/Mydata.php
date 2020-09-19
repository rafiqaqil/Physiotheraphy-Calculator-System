<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mydata extends Model
{
      use \Illuminate\Database\Eloquent\SoftDeletes;
    
        protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
}
