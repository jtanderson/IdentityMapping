<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circle extends Model
{
    //automatically adds to circle table in DB, override: protected $table
    //$id is primary id, override: $primaryKey & autoincrements automatically
    //automatically uses updated_at and created_at
  
    protected $table = "circle";

}
