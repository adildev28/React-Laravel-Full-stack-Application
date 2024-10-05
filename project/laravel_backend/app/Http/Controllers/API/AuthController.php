<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller
{
    public function login(Request $request)
    {
      $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ],[
                'password.required'=>'password required',
            ]);
        try{

            $user = User::where('email',$request->email)->first();
            if(!$user || !Hash::check($request->password, $user->password)){
                return ['message'=>'email or password not valid!'];
            }

            $token = $user->createToken($user->name);

            return response()->json(['message' => 'Login successful', 'token' => $token->plainTextToken, 'user' => $user]);

        }catch(Exception $e){
                return ['message'=>'there is an error in the operation',$e];
            }
    }

    public function register(RegisterRequest $request){
        //validate the request and hashing the password
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        //store the photo in the storage and in the database
        $photoPath = Storage::disk('public')->put('photos', $request->file('photo'));
        $data['photo'] = $photoPath;
        //trying create the user and generat token and also handling errors
        try {
            $user = User::create($data);
            $token = $user->createToken('auth_token');
            return response()->json(['message' => 'User registered successfully', 'token' => $token->plainTextToken,'user'=>$user]);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error registering user'], 500);
        }

    }
    public function logout(Request $request)
    {
        try{
        // remove the user's token
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully']);

        }catch(Exception $error){
            return json(["error"=>"there is an error ","message"=>$error]);
        }

    }

}
