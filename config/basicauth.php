<?php

return [
    "users" =>
        collect([
            ['api', 'password'],
            [env('API_BASIC_AUTH_USER', 'api-user'), env('API_BASIC_AUTH_PASSWORD','password')]
        ])
];
