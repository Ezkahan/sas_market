<?php

return [
    'paths' => ['api/*', 'gql', 'sanctum/csrf-cookie', "/*"],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['http://localhost:3000', 'http://93.171.223.16:90'],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
