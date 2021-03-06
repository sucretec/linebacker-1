<?php

namespace linebacker\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
         'api/login',
         'api/contactsByUser',
         'api/contactsByUser/store',
         'api/register',
         'api/confirmation',
         'api/account',
    ];
}
