<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\OrderRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Response;

class OrderController extends Controller
{

    public function store(OrderRequest $request){
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();

        return 111111111;
    }

}
