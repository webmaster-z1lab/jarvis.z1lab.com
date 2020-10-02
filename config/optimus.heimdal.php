<?php

use Optimus\Heimdal\Formatters;
use Optimus\Heimdal\ResponseFactory;
use Symfony\Component\HttpKernel\Exception as SymfonyException;

return [
    'add_cors_headers' => TRUE,

    // Has to be in prioritized order, e.g. highest priority first.
    'formatters'       => [
        Illuminate\Auth\Access\AuthorizationException::class       => Formatters\AuthorizationExceptionFormatter::class,
        Illuminate\Validation\ValidationException::class           => Formatters\ValidationExceptionFormatter::class,
        SymfonyException\HttpException::class                      => Formatters\HttpExceptionFormatter::class,
        Exception::class                                           => Formatters\ExceptionFormatter::class,
    ],

    'response_factory' => ResponseFactory::class,

    'reporters' => [],

    'server_error_production' => 'Ocorreu um erro.',
];
