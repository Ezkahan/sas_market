<?php

namespace App\Http\GraphQL\User\Mutations;

use Arr;
use Illuminate\Support\Facades\Auth;
use Domain\User\Models\User;

class AuthMutator
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function login($root, array $args)
    {
        $credentials = Arr::only($args, ['email', 'password']);

        if (Auth::attempt($credentials)) {
            $token = Auth::$user->createToken('sas_market')->accessToken;

            return [
                'id' => Auth::id(),
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
                'token' => $token,
            ];
        }

        return null;
    }

     /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function register($root, array $args)
    {
        $data = Arr::only($args, ['email', 'phone', 'password']);
        $user = User::create($data);
        $token = $user->createToken('sas_market')->accessToken; // plainTextToken

        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'token' => $token,
        ];
    }
}
