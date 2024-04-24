<?php
require 'functions.php';
//require 'router.php';

// connect to our MySQL database

$dsn = "mysql:host=localhost;port=3306;dbname=app;charset=utf8mb4";
$username = "app";
$password = "app";
$pdo = new PDO($dsn, $username, $password);

$statement = $pdo->prepare("SELECT * FROM posts");
$statement->execute();


// $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

// This doesn't work if fetchAll is uncommented
// Result is first row in DB
$hwpost = $statement->fetch(PDO::FETCH_ASSOC);
echo "<li>" . $hwpost['title'] . "</li>";

// foreach ($posts as $post) {
//  echo "<li>" . $post['title'] . "</li>";
// }
