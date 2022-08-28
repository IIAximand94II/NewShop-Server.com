<?php

namespace App\Http\Controllers\API\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Blog\TagResource;
use App\Models\Blog\Tag;
use Illuminate\Support\Facades\DB;
use Response;

class TagController extends Controller
{

    public function index(){
        $tags = Tag::all();
        return TagResource::collection($tags);
    }
}
