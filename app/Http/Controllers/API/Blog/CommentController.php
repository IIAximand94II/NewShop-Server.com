<?php

namespace App\Http\Controllers\API\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CommentRequest;
use App\Models\Blog\Comment;
use Illuminate\Support\Facades\DB;
use Response;

class CommentController extends Controller
{

    public function store(CommentRequest $request){
        $data = $request->validated();
        //$data['user_id'] = auth()->user()->id;
        dd($data);
        $comment = Comment::create($data);
        return response()->json(['message' => 'Comment created.']);
    }
}
