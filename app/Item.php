<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
          use \Illuminate\Database\Eloquent\SoftDeletes;
    
        protected $guarded = [];
    
     public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
     public function quote()
{
	return $this->belongsTo(Quote::class);
}
}
