<?php

return [
    'rules' => [
        'create' => [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ],

        'reset' => [
            'password' => 'required|string|confirmed|min:6',
        ],
    ]
];
