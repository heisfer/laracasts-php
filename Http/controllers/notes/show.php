<?php

use Core\App;
use Core\Database;

/**
 * @var Database $db
 */
$db = App::resolve(Database::class);


$currentUserId = 2;

$note = $db->query('select * from notes where id = ? ', [$_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
  'heading' => 'My note',
  'note' => $note
]);
