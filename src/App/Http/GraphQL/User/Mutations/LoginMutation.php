<?php

namespace App\Http\GraphQL\User\Mutations;

use Domain\User\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return [
                'message' => 'Error',
            ];
        }

        $token = $user->createToken('sas_market')->plainTextToken;

        return [
            'token' => $token,
            'user'  => $user,
        ];
    }

    public function rules()
    {
        return [
            'phone'    => ["digits_between:7,11", "unique:users"],
            'password' => ["required"],
        ];
    }
}
