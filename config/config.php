<?php

return [
    'api_key' => env('LARAVEL_SEARCH_PLACE_KEY', null),
    'service' => env('LARAVEL_SEARCH_PLACE_SERVICE', 'google'),
    'options' => [
        'fields' => 'formatted_address,name,geometry'
    ]
];
