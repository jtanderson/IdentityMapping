<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TextContent extends Model
{
  protected $attributes = [
    'key' => "",
    'content' => "",
    'description' => ""
  ];

  protected $table = 'textcontent';
}
