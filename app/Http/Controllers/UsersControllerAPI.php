<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;

class UsersControllerAPI extends Controller
{
    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return new UserResource($user);
    }

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
    }

    public function update($id, UserStoreRequest $request)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        Storage::delete('public/' . $user->image); // delete old image from storage
        $imageName = time() . '.' . $request->image->extension();
        $user->image = $imageName;
        $request->image->storeAs('public', $imageName);
        $user->save();
    }

    public function destroy($id)
    {
        User::find($id)->delete();
    }
}
