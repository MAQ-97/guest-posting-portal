<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keyword extends Model
{   
    protected $table = 'keywords';
    protected $fillable = ['id', 'keyword'];

}
