<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginUserRequest;
use App\Http\Requests\Api\Auth\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;


use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;

    }

    public function store(LoginUserRequest $request)
    {



        $user = $this->model->where('email', $request->email)->firstOrFail();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return (new UserResource($user))
                    ->additional([
                        'token' => $user->createToken("login")->plainTextToken,
                    ]);

    }
    //
}
