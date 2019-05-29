<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\User;

class ResetPasswordMutation extends Mutation
{
    protected $attributes = [
        'name' => 'ResetPasswordMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('UserType'); 
    }

    public function args()
    {
        return [
            'email' => [
                'type' => Type::nonNull(Type::string())
            ],
            'password' => [
                'type' => Type::nonNull(Type::string()),
                'rules' => ['max:8']
            ],
            'conf_password' => [
                'type' => Type::nonNull(Type::string()),
                'rules' => ['max:8']
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $user = User::where('email' , $args['email'])->first();
        if ($args['password'] == $args['conf_password']) {
            $user->password = $args['conf_password'];
            $user->save();
            return $user;
        } else {
            return [];
        }
    }
}
