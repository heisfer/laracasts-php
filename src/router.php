<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
function abort($code)
{
  http_response_code($code);

  require "views/{$code}.view.php";

  die();
}

# Tutorial used array_key_exists and $routes array. I replaced it with "match";
match ($uri) {
  '/' => require 'controllers/index.php',
  '/about' => require 'controllers/about.php',
  '/contact' => require 'controllers/contact.php',
  '/mission' => require 'controllers/mission.php',
  '/notes' => require 'controllers/notes.php',
  '/note' => require 'controllers/note.php',
  default => abort(404),
};
