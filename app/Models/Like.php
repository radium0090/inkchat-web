<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id', 'post_id'];

    public function Post()
    {
      return $this->belongsTo('App\Models\Post');
    }

    public function User()
    {
      return $this->belongsTo('App\User');
    }

    
}
