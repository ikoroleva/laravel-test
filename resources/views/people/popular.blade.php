<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Popular</title>
</head>
<body>
    <h2>Top popular actors</h2>
    <ul>
        <?php foreach ($popularActors as $actor) : ?>
            <li>
                <a href="{{ route('actor.detail', $actor->actor_id)}}">
                    {{ $actor->fullname }}
            </a>
            </li>
        <?php endforeach; ?>
    </ul>
    
</body>
</html>