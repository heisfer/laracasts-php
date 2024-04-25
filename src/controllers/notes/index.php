<?php
$config = require('config.php');
$db = new Database($config['database']);

$heading = 'My Notes';

$notes = $db->query('select * from notes where user_id = ?', [2])->get();
include 'views/notes/index.view.php';
