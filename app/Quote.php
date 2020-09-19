<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{   
       use \Illuminate\Database\Eloquent\SoftDeletes;
    
        protected $guarded = [];
    
     public function user()
    {
        return $this->belongsTo(User::class);
    }
    
     public function project()
{
	return $this->belongsTo(Quote::class);
}
         public function items()
    {
        return $this->hasMany(Item::class)->orderBy('created_at', 'DESC');
    }
}
