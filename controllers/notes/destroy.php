<?php

use Core\App;
use Core\Database;

/**
 * @var Database $db
 */
$db = App::resolve(Database::class);


$currentUserId = 2;

$note = $db->query('select * FROM notes where id = :id', [
  'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', [
  'id' => $_POST['id']
]);
header('location: /notes');
exit();
