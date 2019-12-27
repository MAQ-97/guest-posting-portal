<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_log extends Model
{
    protected $table = 'order_log';
    protected $fillable = ['id', 'meta_key','meta_value'];
    public  $timestamps = false;
}
