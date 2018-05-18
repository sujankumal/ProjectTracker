<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileImage extends Model
{
    //
	protected $fillable = [
        'user_id',
        'pimage',
    ];
}
