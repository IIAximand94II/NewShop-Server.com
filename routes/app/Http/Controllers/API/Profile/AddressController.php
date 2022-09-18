<?php

namespace App\Http\Controllers\API\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\AddressRequest;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Facades\DB;
use Response;

class AddressController extends Controller
{

    public function store(AddressRequest $request, User $user){
        $data = $request->validated();
        $data['user_id'] = $user->id;
        UserAddress::create($data);
        return response()->json(['message' => 'Address added!']);
    }

    public function update(AddressRequest $request, UserAddress $address){
        $data = $request->validated();

        return response()->json(['message' => 'Address updated!']);
    }

    public function delete(User $user,UserAddress $address){
        //dd($address);
        $address->delete();
        return response()->json(['message'=>'Address deleted!']);
    }

}
