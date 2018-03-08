<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class qr extends Model
{
    //
    protected $fillable = [
        'project_id','QR_Generate','supervisor_check',
        'leader_check','member_i_check','member_ii_check',
    ];
}
