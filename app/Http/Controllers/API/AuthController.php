<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\ForgotPassRequest;
use App\Http\Requests\API\Auth\LoginRequest;
use App\Http\Requests\API\Auth\RegisterRequest;
use App\Http\Requests\API\Auth\ResetPassRequest;
use App\Http\Resources\UserResource;
use App\Mail\User\Auth\ResetPassMail;
use App\Mail\User\Auth\VerifiedMail;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Testing\Fluent\Concerns\Has;
use Response;

class AuthController extends Controller
{


    public function register(RegisterRequest $request){
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::firstOrCreate($data);

        $response = [
            'message' => 'Registration successfully! Login in you account.',
        ];
        return Response::json($response);

    }

//    public function verify(User $user){
//        if(!$user->hasVerifiedEmail()){
//            $user->markEmailAsVerified();
//            return Response::json(['message'=>'User is verified!']);
//        }
//        return Response::json(['message'=>'User is not verified!']);
//          11111111111111111111111111111111111111111111
//    }
//
//    public function resend(){
//        if(auth()->user()->hasVerifiedEmail()){
//            return Response::json(['message'=>'User verified.']);
//        }
//        auth()->user()->sendEmailVerificationNotification();
//
//        return Response::json(['message'=>'Email verification link send on your email address.']);
//    }

    public function login(LoginRequest $request){
        $data = $request->validated();
        $user = User::where('email', $data['email'])->first();
        if(!$user || !Hash::check($data['password'], $user->password)){
            return Response::json(['message'=>'No record found']);
        }
//        if(!$user->email_verified_at){
//            return Response::json(['message'=>'Confirmed your email address']);
//        }
        $token = $user->createToken('authToken')->plainTextToken;
        $response = [
            'message' => 'Login successfully.',
            'user_info' => new UserResource($user),
            'token' => $token,
        ];
        return Response::json($response);
    }

    public function refresh(){
        $user = auth()->user();
        auth()->user()->tokens()->delete();
        $token = $user->createToken('authToken')->plainTextToken;
        $response = [
            'message' => 'Token refreshed',
            'token' => $token,
        ];
        return Response::json($response);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return Response::json(['message' => 'Logout']);
    }

    public function forgot(ForgotPassRequest $request){
        $data = $request->validated();
        $user = User::where('email', $data['email'])->first();
        if(!$user){
            return Response::json('User not found or invalid email.');
        }
//        if(!$user->email_verified_at){
//            return Response::json(['message'=>'Confirmed your email address']);
//        }
        $userName = "$user->first_name $user->last_name";
        $resetPasswordToken = str_pad(random_int(1, 999), 6, '0', STR_PAD_LEFT);
        //$resetPasswordToken = Hash::make($resetPasswordToken);
        $userPassReset = PasswordReset::where('email', $user->email)->first();
        if(!$userPassReset){
            PasswordReset::create([
                'email' => $user->email,
                'token' => $resetPasswordToken,
            ]);
        }else{
            $userPassReset->update([
                'email' => $user->email,
                'token' => $resetPasswordToken
            ]);
        }
        Mail::to($user->email)->send(new ResetPassMail($resetPasswordToken, $userName));
        $response = [
            'message' => 'The code has been sent to the specified email.'
        ];
        return Response::json($response);
    }

    public function reset(ResetPassRequest $request){
        $data = $request->validated();
        $user = User::where('email', $data['email'])->first();
        if(!$user){
            return Response::json(['message' => 'User not found or invalid email.']);
        }
        $resetRequest = PasswordReset::where('email', $user->email)->first();

        if(!$resetRequest || $resetRequest->token != $data['token']){
            return Response::json(['message' => 'Error! Token mismatch.']);
        }
        $newPass = Hash::make($data['password']);
        $user->update([
            'password' => $newPass,
        ]);
        $user->tokens()->delete();
        $resetRequest->delete();
        $token = $user->createToken('authToken')->plainTextToken;
        $response = [
            'message' => 'Password reset!',
            'user_info' => new UserResource($user),
            'token' => $token,
        ];
        return Response::json($response);
    }
}
