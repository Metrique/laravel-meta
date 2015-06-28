<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Meta tag defaults.
    |--------------------------------------------------------------------------
    |
    | This file is for storing the meta tags, and title data.
    |
    */

    'title' => [
        'default' => 'Laravel Meta',
        'prefix' => '',
        'suffix' => 'Metrique',
        'seperator'  => ' | ',
    ],

    'tags' => [
        ['charset'=>'utf-8'],
        ['http-equiv'=>'X-UA-Compatible', 'content'=>'IE=edge,chrome=1'],
        ['name'=>'description', 'content'=>'Here lies the default description'],
        ['name'=>'viewport', 'content'=>'width=device-width, initial-scale=1'],
    ],
];