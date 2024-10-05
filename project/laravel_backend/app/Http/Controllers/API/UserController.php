<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    // public function __construct()
    // {
    //     // Apply the middleware to all methods except 'index'
    //     $this->middleware('admin')->except('index');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $users=User::all();
       return response()->json($users);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $user=$request->validated();
        // dd($user);
        $user['password']=Hash::make($request->password);
        User::create($user);
         return response()->json(['message'=>'user created successfully','user'=>$user, 201]);

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        // dd($request);
        $data=$request->validate([
            'name' => 'sometimes|string|max:30|min:5',
            'email' => 'sometimes|email',
            'role' => 'sometimes|string|in:user,admin',
            'password'=>'sometimes|confirmed|min:8|regex:/[a-zA-Z]/|regex:/[0-9]/|regex:/[@$!%*?&#]/', // Must include at least one letter and one number and one symbol'
            'photo' => 'sometimes','mimes:png,jpg,jpeg|max:2048',
        ]);
        $user->update($data);
         return response()->json(['message'=>'user updated successfully !','updated user'=> $user, 200]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message'=>'user deleted successfully', 200]);
    }

}
