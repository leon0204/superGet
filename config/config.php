<?php
return [
    // Cache lifetime.
    'cache_minutes' => 2,
    // 是否刷新缓存.
    'refresh_cache' => 0,

    // Api service host.
    'api_base_url' => '',

    // Models alias map to class.
    'models' => [
        'content' => SuperGet\Models\ContentModel::class,
    ],

    'dals' => [
//
    ],

    'pagination' => [
        'layout' => '',
        'total' => '',
        'previous' => '',
        'links' => '',
        'link_active' => '',
        'next' => '',
        'dots' => '',
    ]
];
