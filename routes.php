<?php

use Core\Response;

# Tutorial used array_key_exists and $routes array. I replaced it with "match";
# match ($uri) {
#  '/' => require 'controllers/index.php',
#  '/about' => require 'controllers/about.php',
#  '/contact' => require 'controllers/contact.php',
#  '/mission' => require 'controllers/mission.php',
#  '/notes' => require 'controllers/notes/index.php',
#  '/notes/create' => require 'controllers/notes/create.php',
#  '/note' => require 'controllers/notes/show.php',
#  default => abort(Response::NOT_FOUND),
#};

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/notes/create', 'controllers/notes/create.php');
$router->get('/contact', 'controllers/contact.php');
$router->get('/mission', 'controllers/mission.php');
