<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    //

    public function blog_meta()
    {
        return $this->hasMany('App\blog_meta');
    }
}
