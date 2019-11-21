<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //use Filterable;
    
    //
    public function category()
    {
        return $this->belongsTo('App\Models\Category')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault(['name' => 'Admin','thumbnail' => '/files/1/no-image.png']);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function getBodyPlainAttribute()
    {
        return strip_tags($this->body); 
    }

    public function getThumbnailAttribute($value)
    {
        return $value? $value: "/files/1/no-image.png";
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function likes()
    {
      return $this->hasMany('App\Models\Like');
    }

    public function like_by()
    {
        if(auth()->check()){
            return Like::where('user_id', auth()->user()->id)->first();
        }
        return false;
    }

    public function isLiked_by_user()
    {
        if(auth()->check()){
            return $this->likes()->where('user_id',auth()->user()->id)->exists();
        }
        return false;
    }

    
}
