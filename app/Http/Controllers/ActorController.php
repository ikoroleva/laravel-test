<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Person;


class ActorController extends Controller
{
    public function popular()
    {
        $popularActors = DB::select(
            "SELECT people.fullname, people.id AS actor_id
            FROM people
            LEFT JOIN movie_person ON people.id = movie_person.person_id
            LEFT JOIN movies ON movie_person.movie_id = movies.id

            WHERE movies.rating > ? AND movie_person.position_id = ?
            LIMIT 50",
            [9, 254]
        );

        //dd($popularActors);


        // $popularActors = DB::select("
        // SELECT movie_person.person_id, people.fullname, COUNT(1)
        // FROM people
        // INNER JOIN movie_person ON people.id = movie_person.person_id
        // WHERE movie_person.position_id = ?
        // GROUP BY movie_person.person_id, people.fullname 
        // HAVING COUNT(1) > ?

        // ", [254, 50]);

        return view(
            'people.popular',
            compact('popularActors')
        );
    }

    public function detail($actor_id)
    {
        $actor = Person::findOrFail($actor_id);
        //dd($actor);

        $allCast = DB::select("
        SELECT movies.id AS movie_id, movies.name AS movie_name, movie_person.description, positions.name, positions.id AS position_id
        FROM movies
        LEFT JOIN movie_person ON movie_person.movie_id = movies.id
        LEFT JOIN people ON people.id= movie_person.person_id
        LEFT JOIN positions ON movie_person.position_id = positions.id
        
        WHERE people.id = ? 

        ", [$actor_id]);

        //dd($allCast);
        return view(
            'people.detail',
            compact('actor', 'allCast')
        );
    }
}
