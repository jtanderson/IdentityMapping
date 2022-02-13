<?php

// Is all the App stuff import here?

function getTextContent($key){
  $content = \App\TextContent::where('key', $key)->first();
  return $content ? $content->content : '';
}