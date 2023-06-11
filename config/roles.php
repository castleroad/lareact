<?php

return [
    'super-admin' => [
        'permissions' => ['*'],
    ],
    'admin' => [
        'permissions' => [
            'user_view',
            'user_edit',
            'travel_view',
            'travel_edit',
            'tour_view',
            'tour_edit',
            'tour_delete',
        ],
    ],
    'manager' => [
        'permissions' => [
            'user_view',
            'travel_view',
            'travel_edit',
            'tour_view',
            'tour_edit',
        ],
    ],
    'user' => [
        'permissions' => [
            'user_view',
            'travel_view',
            'tour_view',
        ],
    ],
    'permissions' => [
        'user_view',
        'user_edit',
        'user_delete',
        'travel_view',
        'travel_edit',
        'travel_delete',
        'tour_view',
        'tour_edit',
        'tour_delete',
    ],
];
