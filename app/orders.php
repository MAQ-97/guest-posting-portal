<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    public $timestamps = true;

    public function user()
    {
        return $this->BelongsTo('App\User');
    }
}
