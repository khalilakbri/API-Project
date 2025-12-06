<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return $user;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json([
                "message"=>"Not Found"
            ],404);
        }

        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        if(!$user){
            return response()->json([
                "message"=>"Not Found"
            ]);
        }

        $user->update($request->all());

        return response()->json([
            "message"=>"Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // User::destroy($id);
        $user = User::find($id);
        if(!$user){
            return response()->json([
                "message"=>"Not Found"
            ]);
        }
        $user->delete();
        return response()->json([
            "message"=>"Deleted"
        ]);
    }
}
