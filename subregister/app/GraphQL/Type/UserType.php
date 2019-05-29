<?php

namespace App\GraphQL\Type;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class UserType extends BaseType
{
    protected $attributes = [
        'name' => 'UserType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'status' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'created_at' => [
                'type' => Type::string(),
            ],
            'updated_at' => [
                'type' => Type::string(),
            ]
        ];
    }
}
