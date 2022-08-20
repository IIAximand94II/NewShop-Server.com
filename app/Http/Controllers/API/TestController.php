<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\FilterRequest;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

    public function index(FilterRequest $request){

        return 112233;
    }
}
