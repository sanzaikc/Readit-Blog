<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title','excerpt','content'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function comments(){
        return $this->hasMany(User::class, 'user_id');
    }
}
