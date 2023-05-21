<?php

namespace App\Http\GraphQL\Mutations;

use Arr;
use Illuminate\Support\Facades\Auth;
use Log;

class AuthMutator
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
    }

    public function login($root, array $args)
    {
        $credentials = Arr::only($args, ['email', 'password']);

        if (Auth::attempt($credentials)) {
            $token = Auth::user()->createToken('orlan')->accessToken;

            return [
                'id' => Auth::id(),
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'token' => $token,
            ];
        }

        return null;
    }

    public function register($root, array $args)
    {
        $credentials = Arr::only($args, ['email', 'password']);
        return null;
    }
}
