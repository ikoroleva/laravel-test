<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actor detail</title>
</head>
<body>
    <h1>Welcome to detailed view</h1>
    <h2><?= $actor->fullname ?></h2>

    <?php foreach ($allCast as $item) : ?>
        <li>
           <a href="{{ route('movies.detail', $item->movie_id)}}">
                {{$item->movie_name}}
           </a>

        </li>
    <?php endforeach; ?>



</body>
</html>