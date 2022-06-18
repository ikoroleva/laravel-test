<?php

namespace App\Http\Controllers;


use DB;
use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;


class MovieController extends Controller
{
    public function index()
    {
        $starting_letter = 'b';
        $movies = Movie::orderBy('name')
            ->where('name', '!=', '')
            ->limit(20)
            ->where('name', 'like', $starting_letter . '%')
            ->get();

        //dd($query_builder);

        return view(
            'movies.index',
            compact('movies', 'starting_letter')
        );
    }
    public function topRated()
    {

        $top_movies = Movie::orderBy('rating')
            ->limit(50)->get();


        // DB::select('
        // SELECT * 
        // FROM `movies`
        // ORDER BY `rating`  DESC
        // LIMIT 50;');


        return view(
            'movies.movies',
            ['top_50_movies' => $top_movies]
        );
    }

    // public function shawshank()
    // {

    //     $shawshank_info = DB::select('
    //     SELECT `movies`.*, 
    //     `movie_types`.`name` AS movie_type_name, 
    //     `certifications`.`slug` AS certifications_slug

    //     FROM `movies`
    //     LEFT JOIN `movie_types` ON `movies`.`movie_type_id` = `movie_types`.`id`
    //     LEFT JOIN `certifications` ON `movies`.`certification_id` = `certifications`.`id`

    //     WHERE `movies`.`id` = 111161');

    //dd($shawshank_info);

    // $shawshank_info = Movie::
    //     ->join('')


    //     return view(
    //         'movies.detail',
    //         ['shawshank_info' => $shawshank_info]
    //     );
    // }

    public function search(Request $request)
    {

        $search_string = $request->input('search', null);
        //$queryParams  = [];

        $resultList = [];

        if (isset($search_string)) {

            $resultList = Movie::where('name', 'like', '%' . $search_string . '%')
                ->get();
        } else {
            $search_string = '';
            $resultList = Movie::orderBy('id', 'desc')
                ->limit(50)->get();
        }

        //dd($resultList);


        return view(
            'movies.search',
            ['search_string' => $search_string],
            ['resultList' => $resultList]
        );
    }

    public function detail($movie_id)
    {
        //$movie_id = $_GET['id'];

        //$movie = Movie::where('id', '=', $movie_id)->first();

        $movie = Movie::findOrFail($movie_id);

        $all_people = DB::select(
            "
            SELECT `positions`.`name` AS position_name, `people`.*
            FROM `movie_person`
            LEFT JOIN `positions`
                ON `movie_person`.`position_id` = `positions`.`id`
            LEFT JOIN `people`
                ON `movie_person`.`person_id` = `people`.`id`
            WHERE `movie_person`.`movie_id` = ?
            ORDER BY `movie_person`.`position_id` DESC, `movie_person`.`priority`",
            [$movie->id]
        );

        $all_reviews = Review::where('movie_id', '=', $movie_id)->get();

        return view('movies.detail', [
            'movie' => $movie,
            'people' => $all_people,
            'reviews' => $all_reviews
        ]);
    }
    public function create()
    {
        // prepare empty object
        $movie = new Movie;

        // display the form view, passing in the movie
        return view('movie.create', compact('movie'));
    }

    public function store(MovieRequest $request)
    {
        //        $this->validateMovie($request);
        $movie = new Movie;

        $movie->name = $request->input('name');
        $movie->year = $request->input('year');

        $movie->save();

        session()->flash('success_message', 'New movie registered.');

        return redirect(url('/movies' . '/' . $movie->id . '/detail'));
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);

        return view('movies.create', compact('movie'));
    }

    public function update($id, MovieRequest $request)
    {
        //        $this->validateMovie($request);
        $movie = Movie::findOrFail($id);

        $movie->name = $request->input('name');
        $movie->year = $request->input('year');

        $movie->save();

        session()->flash('success_message', 'Movie was edited.');

        return redirect(url('/movies' . '/' . $movie->id . '/detail'));
    }

    public function destroy($id)
    {

        $movie = Movie::findOrFail($id);

        $movie->delete();
        session()->flash('success_message', 'Movie was deleted.');

        return redirect(url('/movies'));
    }
}
