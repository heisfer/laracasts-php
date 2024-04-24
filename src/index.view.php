<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Demo</title>
</head>

<body>
  <h1><?= $business['name'] ?></h1>
  <ul>
    <?php foreach ($business['categories'] as $categorie) : ?>
      <li>
        <?= $categorie ?>

      </li>
    <?php endforeach; ?>
  </ul>
</body>

</html>
