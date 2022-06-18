<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {


        $review = new Review();
        $review->movie_id = $request->input('movie_id', 'unknown');
        $review->text = $request->input('value', 'unknown');

        $review->save();

        return redirect()->back();
    }

    public function destroy($id)
    {

        $review = Review::findOrFail($id);

        $review->delete();
        session()->flash('success_message', 'Movie was deleted.');

        return redirect(url('/movies'));
    }
}
