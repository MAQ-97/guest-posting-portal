<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog_keyword extends Model
{
    protected $table = 'blog_keywords';
    
    public function blog()
    {
        return $this->belongsTo('App\blog');
    }

}
