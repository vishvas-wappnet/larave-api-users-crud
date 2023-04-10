<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Authorize the request
        $this->authorize('viewAny', User::class);

        $users = User::all();
        return response()->json(["users" => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json(['user' => $user], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['user' => $user], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Update the user's attributes
        $user->update($request->all());

        // Return the updated user as JSON response
        return response()->json(['user' => $user], 200);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Check if the user exists
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        // Delete the user from the database
        $user->delete();

        // Return a JSON response with a 204 status code
        return response()->json(['message' => 'User deleted successfully'] , 200);
    }
}