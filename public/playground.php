<?php

use Illuminate\Support\Collection;

require __DIR__ . '/../vendor/autoload.php';

$collection = new Collection([
  1, 2, 3, 4, 5, 6, 7, 8, 9, 10
]);

if ($collection->contains(100)) {
  die('it contains 10');
}

$lessThanEqualTo5 = $collection->filter(function ($collection) {
  return $collection <= 5;
});

echo '<pre>';
var_dump($lessThanEqualTo5);
