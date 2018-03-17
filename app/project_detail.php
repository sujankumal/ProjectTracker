<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project_detail extends Model
{
    //
    protected $fillable = [
        'name','year','type','head_id','supervisor_id',
        'leader_id','member_idi','member_idii',
    ];
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
