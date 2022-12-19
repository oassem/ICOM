<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function store(UserStoreRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $imageName = time() . '.' . $request->image->extension();
        $user->image = $imageName;
        $request->image->storeAs('public', $imageName);
        $user->save();
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $request->validate([
            'email' => [
                'required',
                'email',
                'exists:users'
            ],

            'password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if ($user && !Hash::check($value, $user->password)) {
                        return $fail('The ' . $attribute . ' is incorrect.');
                    }
                },
            ]
        ]);

        session_start();
        $_SESSION["user"] = $user->email;
        return redirect()->route('profile');
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        return redirect()->route('login');
    }

    public function view()
    {
        session_start();
        $user = User::where('email', $_SESSION["user"])->first();
        return view('content.profile', ['user' => $user]);
    }

    public function destroy()
    {
        session_start();
        User::where('email', $_SESSION['user'])->first()->delete();
        session_unset();
        session_destroy();
        return redirect()->route('login');
    }
}
