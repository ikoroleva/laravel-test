<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Welcome to the movies controller</h1>
    <h2>Top rated movies</h2>
    <ul>
        <?php foreach ($top_50_movies as $movie) : ?>
            <li>
                <?= $movie->name . ' | Genre:' . $movie->movieType->name ?>

            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>