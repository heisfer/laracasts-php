<?php

use Core\Response;
use Core\Session;

function dd($value)
{

  echo '<pre>';
  var_dump($value);
  echo '</pre>';
  die();
}

function urlIs($value)
{
  return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = Response::FORBIDDEN)
{
  if (!$condition) {
    abort($status);
  }
}


function base_path($path)
{
  return BASE_PATH . $path;
}


function abort($code = 404)
{
  http_response_code($code);

  require base_path("views/{$code}.view.php");

  die();
}

function view($path, $attributes = [])
{
  extract($attributes);
  require base_path('views/' . $path);
}

function redirect($path)
{
  header("location: {$path}");
  exit();
}

function old($key, $default = NULL)
{
  return Session::get('old')[$key] ?? $default;
}
