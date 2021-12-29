<?php

return [

    'title' => 'Login',

    'heading' => 'Sign In',

    'buttons' => [

        'submit' => [
            'label' => 'Sign in',
        ],

    ],

    'fields' => [

        'phone_number' => [
            'label' => 'Phone Number',
        ],

        'email' => [
            'label' => 'Email address',
        ],

        'password' => [
            'label' => 'Password',
        ],

        'remember' => [
            'label' => 'Remember me',
        ],

    ],

    'messages' => [
        'failed' => 'These credentials do not match our records.',
        'throttled' => 'Too many login attempts. Please try again in :seconds seconds.',
    ],

];
