<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/pages/add/uploadImage',
        '/pages/edit/*/editImage',

        '/sliders/add/uploadImage',
        '/sliders/edit/*/editImage',

        '/regulations/add/uploadImage',
        '/regulations/edit/*/editImage',

        '/directors/add/uploadImage',
        '/directors/edit/*/editImage',

        '/founders/add/uploadImage',
        '/founders/edit/*/editImage',

        '/userCards/edit/*/editImage',

        '/events/add/uploadImage',
        '/events/edit/*/editImage',
        '/events/edit/*/deleteImage',
        '/events/edit/*/uploadImage',

        '/initiatives/add/uploadImage',
        '/initiatives/edit/*/editImage',
        '/initiatives/edit/*/deleteImage',
        '/initiatives/edit/*/uploadImage',

        '/users/add/uploadImage',
        '/users/edit/*/editImage',

        '/panelSettings/deleteImage',
        '/panelSettings/*',
        '/generalSettings/*',

        '/photos/add/uploadImage',
        '/photos/edit/*/editImage',
        '/photos/edit/*/deleteImage',
        '/photos/edit/*/uploadImage',


    ];
}
