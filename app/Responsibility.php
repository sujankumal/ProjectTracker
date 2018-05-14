<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsibility extends Model
{
    //
    protected $fillable = [
        'member_id','minute_id','responsibility',
    ];
}
