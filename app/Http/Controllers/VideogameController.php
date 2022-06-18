<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class VideogameController extends Controller
{
    public function topRated()
    {

        $top_games = DB::select('
        SELECT * 
        FROM `movies`
        WHERE `movie_type_id` = 7
        ORDER BY `rating`  DESC
        LIMIT 50;');


        return view(
            'games.games',
            ['top_50_games' => $top_games]
        );
    }
}
