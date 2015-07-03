<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Meta tag character limits.
    |--------------------------------------------------------------------------
    |
    | Here you may set a character limit for meta tags and page titles. You may
    | also set a suffix to be added when a string is trimmed.
    */
    'character' => [
        'limit' = '155',
        'suffix' = '...',
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Page title settings.
    |--------------------------------------------------------------------------
    |
    | Here you can set the default page titles for use when a page title isn't
    | set. You may also set the title to have a prefix, suffix and separator.
    |
    */
    'title' => [
        'default' => 'Laravel Meta',
        'prefix' => '',
        'suffix' => 'Metrique',
        'separator'  => ' | ',
    ],

    /*
    |--------------------------------------------------------------------------
    | Meta tag settings.
    |--------------------------------------------------------------------------
    |
    | Here you may add a default set of tags for use within your web page.
    |
    */
    'tags' => [
        ['charset'=>'utf-8'],
        ['http-equiv'=>'X-UA-Compatible', 'content'=>'IE=edge,chrome=1'],
        ['name'=>'description', 'content'=>'Here lies the default description'],
        ['name'=>'viewport', 'content'=>'width=device-width, initial-scale=1'],
    ],
];