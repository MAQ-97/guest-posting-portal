<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = ['id', 'link','title','description'];

    public function blog_meta()
    {
        return $this->hasMany('App\blog_meta');
    }

    public function blog_keyword(){
        return $this->hasMany('App\blog_keyword');
    }
}
