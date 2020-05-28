<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    //automatically adds to participant table in DB, override: protected $table
    //$id is primary id, override: $primaryKey & autoincrements automatically
    //automatically uses updated_at and created_at

    protected $attributes = [
    	'intersection_meaning' => "",
    ];
}
