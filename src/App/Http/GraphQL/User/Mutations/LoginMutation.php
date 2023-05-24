<?php

namespace App\Http\GraphQL\User\Mutations;

use Arr;
use Hash;
use Illuminate\Support\Facades\Auth;
use Domain\User\Models\User;

final class LoginMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $credentials = Arr::only($args, ['phone', 'password']);
        $user = User::where('phone', $credentials['phone'])->first();
        $token = $user->createToken('sas_market')->plainTextToken;

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return [
                'message' => 'Error',
            ];
        }

        return [
            'phone' => $user->phone,
            'token' => $token,
        ];
    }

    public function rules()
    {
        return [
            'phone' => ["digits_between:7,11", "unique:users"],
            'password' => ["required"],
        ];
    }
}
