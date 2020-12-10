<?php

return [
    'user' => [
        'model' => 'App\User',
        'foreignKey' => null,
        'ownerKey' => null,
    ],
    'broadcast' => [
        'enable' => false,
        'app_name' => 'your-app-name',
        'pusher' => [
            'app_id' => '896331',
            'app_key' => '460b79438845d5cf66cb',
            'app_secret' => '38f5c70c12553aebc35b',
            'options' => [
                'cluster' => 'ap2',
                'encrypted' => true
            ]
        ],
    ],
    'oembed' => [
        'enabled' => false,
        'url' => '',
        'key' => ''
    ]
];
