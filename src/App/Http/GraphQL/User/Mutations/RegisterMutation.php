<?php

namespace App\Http\GraphQL\User\Mutations;

use Domain\User\Models\User;
use Illuminate\Support\Arr;

final class RegisterMutation
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $data = Arr::only($args, ['email', 'phone', 'password']);
        $user = User::create($data);
        $token = $user->createToken('sas_market')->plainTextToken;

        return [
            'id'    => $user->id,
            'name'  => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'token' => $token,
        ];
    }

    public function rules()
    {
        return [
            'firstname' => ["alpha", "min:2", "max:100"],
            'lastname'  => ["alpha", "min:2", "max:100"],
            'email'     => ["email", "unique:users"],
            'phone'     => ["digits_between:7,11", "unique:users"],
        ];
    }

    public function attributes()
    {
        // $type = explode('_', $this->args['mc_dot_number'])[0] ?? null;
        // $type = Str::upper($type);
        // return ['mc_dot_number' => "{$type} number"];
    }
}
