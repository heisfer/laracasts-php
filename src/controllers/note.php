<?php
$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Note';

$id = $_GET['id'];
$note = $db->query('select * from notes where id = ?', [$id])->fetch();
include 'views/note.view.php';
