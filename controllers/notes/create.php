<?php

if ($_SESSION['user'] ?? false) {
  header('location: /');
  exit();
}
view('notes/create.view.php', [
  'heading' => 'Create Note',
  'errors' => []
]);
