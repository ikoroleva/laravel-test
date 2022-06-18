<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Welcome to the games controller</h1>
    <h2>Top rated games</h2>
    <ul>
        <?php foreach ($top_50_games as $game) : ?>
            <li>
                <?= $game->name ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>