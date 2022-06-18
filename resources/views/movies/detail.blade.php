<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detailed view</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <h1>Welcome to detailed view</h1>
    <h2><?= $movie->name ?></h2>
    <div class="list_act_container">
        <a href="{{route('movie.edit', ['movieId' => $movie->id])}}" >
            <button class="edit"><span class="edit_img"></span><p>Edit movie</p></button>
        </a>
        {{-- <form action="/movies/{{$movie->id}}" method="post"> --}}
        <form action="{{route('movie.delete', ['movieId' => $movie->id])}}" method="post">
            @method('delete')
            @csrf
            <button class="delete"><span class="delete_img"></span><p>Delete movie</p></button>
        </form>
</div>

    <div>Movie type: <?= $movie->movie_type_name ?></div>
    <div>Length: <?= $movie->length ?></div>
    <div>Year: <?= $movie->year ?></div>
    <div>Rating: <?= $movie->rating ?></div>
    <div>Number of votes: <?= $movie->votes_nr ?></div>
    <div>Certification: <?= $movie->certifications_slug ?></div>
    <br>

    <?php foreach ($people as $person) : ?>
        <li> {{$person->position_name . ' '}}
            <a href='{{ route('people.detail', $person->id)}}'>
            {{$person->fullname}}
        </a>
        </li>
    <?php endforeach; ?>

    <br>

    <form action="/movies/rate" method="post">
        @csrf
        <input type="hidden" name="movie_id" value="<?= $movie->id ?>">
        <input type="text" name="value" value="">
        <button type='submit'>Comment</button>
    </form>

    <br>
    Reviews:

    <?php foreach ($reviews as $review) : ?>
        <div class="act_container">
            <?= $review->text . ' at ' . $review->created_at ?>

            <form action="">
                @method('delete')
                @csrf
                <button class="delete"><span class="delete_img"></span></button>
            </form>

        </div>
    <?php endforeach; ?>

    <br>
    

</body>



</html>