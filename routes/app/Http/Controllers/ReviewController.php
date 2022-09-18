<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        $reviews = Review::all();
        dd(ReviewResource::collection($reviews));
        return view('review.index', compact('reviews'));
    }

    public function show(Review $review){
        dd($review->user->first()->avatar);
    }

}
