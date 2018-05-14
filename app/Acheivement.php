<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acheivement extends Model
{
    //
    protected $fillable = [
        'member_id','minute_id','acheivement',
    ];
}
