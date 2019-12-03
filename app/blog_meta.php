<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog_meta extends Model
{
    //

    public function blog()
    {
        return $this->belongsTo('App\blog');
    }
}
