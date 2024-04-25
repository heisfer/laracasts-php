<?php
$config = require base_path('config.php');
$db = new Database($config['database']);

$currentUserId = 3;

$heading = 'Note';

$note = $db->query('select * from notes where id = ? ', [$_GET['id']])->findOrFail();

authorize($note['user_id'] !== 3);



view('notes/show.view.php', [
  'heading' => 'My note',
  'note' => $note
]);
