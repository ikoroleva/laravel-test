<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    //the index action of the index controller
    
    public function index()
    {
        $user = ['name' => 'Irina',
        'role' => 'admin'];

        //dd($user);

        $top_movies = DB::select('
        SELECT * 
        FROM `movies`
        ORDER BY `rating`  DESC
        LIMIT 10;');

        //dd($top_movies);

        //return 'Hello world! (from the index action of the IndexController)';

        //index/index.blade.php
        return view('index.index', ['my_variable' => 'Hello, world!', 'things_to_do' => ['one thing', 'another thing'], 'user'=> $user, 'top_10_movies' => $top_movies]);

    }

    public function top20movies()
    {
     return '<h1> There are the top 20 movies of this year</h1>';
    }


}
