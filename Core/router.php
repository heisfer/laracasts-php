<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
require base_path('routes.php');
function abort($code)
{
  http_response_code($code);

  require view("{$code}.view.php");

  die();
}
