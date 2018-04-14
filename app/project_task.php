<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project_task extends Model
{
    //
    protected $fillable = [
        'project_id','task',
    ];
}
