<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
require 'routes.php';
function abort($code)
{
  http_response_code($code);

  require "views/{$code}.view.php";

  die();
}
