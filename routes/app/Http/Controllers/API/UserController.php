<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Response;

class UserController extends Controller
{

    public function index(User $user){
        $response = [
            'user_info'=>new UserResource($user),
        ];
        return Response::json($response);
    }

}
