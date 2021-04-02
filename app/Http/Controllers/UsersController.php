<?php


namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::where('id', '=', $id)->first();

        if (!$user) {
            return response()->json(['user' => $user, 'code' => 404, 'status' => 'error']);
        } else {
            return response()->json(['user' => $user, 'code' => 200, 'status' => 'success']);
        }
    }

    public function index(User $user)
    {
        $users = $user->where('created_at', '>=', Carbon::yesterday())->get();
        return response()->json(['users' => $users, 'code' => 200, 'status' => 'success']);
    }

    public function store(Request $request, User $user)
    {
        $validated_data = $request->validate(array(
            'name'     => 'required|min:3',
            'email'    => 'required|unique:users|email',
            'password' => 'required|min:8'
        ));

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = md5($request->password);
        $user->save();

        return response()->json(['user' => $user, 'code' => 201]);
    }
}
