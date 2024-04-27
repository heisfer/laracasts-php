<?php

use Core\App;
use Core\Database;

/**
 * @var Database $db
 */
$db = App::resolve(Database::class);

$heading = 'My Notes';

$notes = $db->query('select * from notes where user_id = ?', [2])->get();
view('notes/index.view.php', [
  'heading' => 'My notes',
  'notes' => $notes
]);
