<?php

$books = [
  [
    'name' => 'php for dummies',
    'published' => 2020,
    'author' => 'lambo guy',
    'purchaseUrl' => 'https://example.com'
  ],
  [
    'name' => 'Project Hail Mary',
    'published' => 2001,
    'author' => "Andy Weir",
    'purchaseUrl' => 'https://example.com'
  ],
  [
    'name' => 'The fall of Heisfer Light',
    'published' => 2231,
    'author' => 'Sofia Light',
    'purchaseUrl' => 'https://example.com'
  ],
  [
    'name' => 'The Martain',
    'published' => 2001,
    'author' => 'Andy Weir',
    'purchaseUrl' => 'https://example.com',
  ]
];

$movies = [
  [
    'title' => 'Annabelle: Comes Home',
    'releaseYear' => 2019,
    'studio' => 'Warner Bros',
    'purchaseUrl' => 'https://example.com'
  ],
  [
    'title' => 'Son of Batman',
    'releaseYear' => 2014,
    'studio' => 'Warner Bros',
    'purchaseUrl' => 'https://example.com'
  ],
  [
    'title' => 'Frida',
    'releaseYear' => 2002,
    'studio' => 'Miramax Films',
    'purchaseUrl' => 'https://example.com'
  ]
];
$filteredBooks = array_filter($books, function ($book) {
  return $book['published'] >= 2000 && $book['published'] <= 2020;
});

$filteredMovies = array_filter($movies, function ($movie) {
  return $movie['releaseYear'] >= 2000;
});

require('index.view.php');
