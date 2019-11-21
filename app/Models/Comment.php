<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //use Checked;
    protected $fillable = [
        'post_id','user_id','body'
    ];
    
    public function post()
    {
        return $this->belongsTo('App\Models\Post')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }


}
