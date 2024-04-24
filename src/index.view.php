<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Demo</title>
</head>

<body>
  <h1>Recommended books</h1>

  <ul>
    <?php foreach ($books as $book) : ?>
      <li>
        <a href="<?= $book['purchaseUrl'] ?>">
          <?= $book['name'] ?> (<?= $book['published'] ?>)
          - By <?= $book['author'] ?>

        </a>

      </li>
    <?php endforeach; ?>
  </ul>
  <h1>Filtered books</h1>
  <ul>
    <?php foreach ($filteredBooks as $book) : ?>
      <li><?= $book['name'] ?> - By <?= $book['author'] ?></li>
    <?php endforeach; ?>
  </ul>
  <h1>Movies</h1>
  <ul>
    <?php foreach ($filteredMovies as $movie) : ?>
      <li>
        <a href="<?= $movie['purchaseUrl'] ?>">
          <?= $movie['title'] ?> ( <?= $movie['releaseYear'] ?>) - By <?= $movie['studio'] ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</body>

</html>
