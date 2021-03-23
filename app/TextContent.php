<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TextContent extends Model
{
  protected $attributes = [
    'key' => "",
    'name' => "",
    'content' => "",
    'description' => ""
  ];

  protected $table = 'textcontent';
}
