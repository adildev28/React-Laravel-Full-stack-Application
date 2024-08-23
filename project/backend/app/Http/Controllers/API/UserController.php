<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $users=User::all()->get();
       return response()->json($users);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $user=$request->validated();
        User::create($user);
         return response()->json(['message'=>'user created successfully','user'=>$user, 200, $headers]);

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $data=$request->validate([

        ]);
        $user->update($data);
         return response()->json(['message'=>'user updated successfully !','updated user'=> $user, 200, $headers]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message'=>`user {$user->id} deleted successfully`, 200, $headers]);
    }

    // get the authentified user
    public function getAuthentifiedUser(Request $request) {
        $user=Auth::user();
        return response()->json($user);
    }
}
