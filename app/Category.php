<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Category extends Model {
  protected $table = 'category';

  protected $fillable = ['name'];

  protected $attributes = [];

  public function circles(){
    return $this->hasMany('App\Circle');
  }
}
