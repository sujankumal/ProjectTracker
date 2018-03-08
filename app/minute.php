<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class minute extends Model
{
    //
    protected $fillable = [
        'project_id','progress_percentage',
        'agenda','discussion','leader_acheivement',
        'member_i_acheivement','member_ii_acheivement',
        'leader_responsibility','member_i_responsibility',
        'member_ii_responsibility',
    ];
}
