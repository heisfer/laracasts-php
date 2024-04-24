<?php
require 'functions.php';
require 'Database.php';
require 'router.php';


$db = new Database();
$posts = $db->query("SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC);

// connect to our MySQL database

foreach ($posts as $post) {
  echo "<li>" . $post['title'] . "</li>";
}
