<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel test project</title>
</head>
<body>
    <h1>Welcome to my Laravel test project</h1>
    <h1><?=$my_variable?></h1>
    <h1>Hello, <?=$user['name']?></h1>
    <h2>There are some things you can do:</h2>
    <ul>
        <!-- <li>Stay here</li>
        <li>Go somewhere else</li> -->
        <?php foreach ($things_to_do as $thing) :?>
            <li>
                <?= $thing ?>
            </li>
        <?php endforeach; ?> 
    </ul>
    <ul>
    <?php foreach ($top_10_movies as $movie) :?>
            <li>
                <?= $movie->name ?>
            </li>
        <?php endforeach; ?> 
    </ul>
</body>
</html>