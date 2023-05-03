<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;

    }


    public function index()
    {
        $users = $this->user->paginate();

        return UserResource::collection($users);
        //
    }


    public function store(UserCreateRequest $request)
    {

        $request->validated();

        $users = $this->user->create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password)
        ]);

        return new UserResource($users);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        $users = $this->user->where("uuid",$uuid)->firstOrFail();
        return new UserResource($users);
        //
    }
    public function update(UserUpdateRequest $request, string $uuid)
    {
        //
        $users = $this->user->where("uuid",$uuid)->firstOrFail();
        $users->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password)
        ]);

        return new UserResource($users);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $users = $this->user->where("uuid",$uuid)->firstOrFail();
        $users->delete();

        return new UserResource($users);
        //
    }
}
