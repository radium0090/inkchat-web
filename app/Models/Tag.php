<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name', 
    ];
    //
    public function shops()
    {
        return $this->belongsToMany('App\Model\Shop');
    }
}
