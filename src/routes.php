<?php
# Tutorial used array_key_exists and $routes array. I replaced it with "match";
match ($uri) {
  '/' => require 'controllers/index.php',
  '/about' => require 'controllers/about.php',
  '/contact' => require 'controllers/contact.php',
  '/mission' => require 'controllers/mission.php',
  '/notes' => require 'controllers/notes.php',
  '/notes/create' => require 'controllers/notes-create.php',
  '/note' => require 'controllers/note.php',
  default => abort(404),
};
