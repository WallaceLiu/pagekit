<?php

return [

    'name' => 'system/user',

    'main' => 'Pagekit\\User\\UserModule',

    'autoload' => [

        'Pagekit\\User\\' => 'src'

    ],

    'routes' => [

        '/user' => [
            'name' => '@user',
            'controller' => [
                'Pagekit\\User\\Controller\\AuthController',
                'Pagekit\\User\\Controller\\ProfileController',
                'Pagekit\\User\\Controller\\RegistrationController',
                'Pagekit\\User\\Controller\\ResetPasswordController',
                'Pagekit\\User\\Controller\\UserController'
            ]
        ],
        '/api/user' => [
            'name' => '@user/api',
            'controller' => [
                'Pagekit\\User\\Controller\\RoleApiController',
                'Pagekit\\User\\Controller\\UserApiController'
            ]
        ]

    ],

    'resources' => [

        'system/user:' => ''

    ],

    'permissions' => [

        'user: manage users' => [
            'title' => 'Manage users',
            'description' => 'Warning: Give to trusted roles only; this permission has security implications.'
        ],
        'user: manage user permissions' => [
            'title' => 'Manage user permissions',
            'description' => 'Warning: Give to trusted roles only; this permission has security implications.'
        ],
        'user: manage settings' => [
            'title' => 'Manage settings',
            'description' => 'Warning: Give to trusted roles only; this permission has security implications.'
        ],
        'system: access admin area' => [
            'title' => 'Access admin area',
            'description' => 'Warning: Give to trusted roles only; this permission has security implications.'
        ]

    ],

    'menu' => [

        'user' => [
            'label' => 'Users',
            'icon' => 'system/user:assets/images/icon-users.svg',
            'url' => '@user',
            'active' => '@user*',
            'access' => 'user: manage users || user: manage user permissions',
            'priority' => 115
        ],
        'user: users' => [
            'label' => 'List',
            'parent' => 'user',
            'url' => '@user',
            'active' => '@user(/edit)?',
            'access' => 'user: manage users',
        ],
        'user: permissions' => [
            'label' => 'Permissions',
            'parent' => 'user',
            'url' => '@user/permissions',
            'access' => 'user: manage user permissions'
        ],
        'user: roles' => [
            'label' => 'Roles',
            'parent' => 'user',
            'url' => '@user/roles',
            'access' => 'user: manage user permissions'
        ],
        'user: settings' => [
            'label' => 'Settings',
            'parent' => 'user',
            'url' => '@user/settings',
            'access' => 'user: manage user settings'
        ]

    ],

    'config' => [

        'registration' => 'admin',
        'require_verification' => true,
        'users_per_page' => 5,

        'auth' => [
            'refresh_token' => false
        ]

    ]

];
