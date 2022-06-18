<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <h1>Welcome to the search</h1>
    <div class="list_act_container">
    <form action="/movies/create">
        <button class="add"> Add new movie</button>
    </form>
</div>

    
    <br>
    <form action="/movies" method="get">

        <input type="text" name="search" value="{{$search_string}}">

        <button>Search</button>

    </form>
    <h2>Last added movies</h2>
    <ul>
        @foreach ($resultList as $item)
            <li><a href='{{ route('movie.detail', $item->id)}}'>
                    {{ $item->name }}
                </a>
            </li>
        @endforeach
    </ul>

</body>

</html>