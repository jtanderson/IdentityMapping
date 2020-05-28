<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circle extends Model
{
    //automatically adds to circle table in DB, override: protected $table
    //$id is primary id, override: $primaryKey & autoincrements automatically
    //automatically uses updated_at and created_at

    //G: should we add variables in here? Thought it only needed for us to create a class variable and it would pull from DB
}
