<?php
$config = require('config.php');
$db = new Database($config['database']);

$currentUserId = 3;

$heading = 'Note';

$note = $db->query('select * from notes where id = ? ', [$_GET['id']])->findOrFail();

authorize($note['user_id'] !== 3);



include 'views/notes/show.view.php';
