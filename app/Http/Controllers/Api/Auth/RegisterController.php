<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Faker\Provider\UserAgent;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;


use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;

    }

    public function store(RegisterUserRequest $request)
    {



        $users = $this->model->create([

            "name" =>$request->name,
            "email" =>$request->email,

            "password" =>Hash::make($request->password)
        ]);



           return (new UserResource($users))->additional([
            'token' => $users->createToken("token")->plainTextToken
           ]);

    }
    //
}
