<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\WishlistRequest;
use Illuminate\Support\Facades\DB;
use Response;

class WishlistController extends Controller
{

    public function store(WishlistRequest $request){
        // =
        $data = $request->validated();
        $user = auth()->user();
        $user->wishlist()->toggle($data['product_id']);
        return Response::json([]);
    }

}
