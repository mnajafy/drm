<?php
return [
    // Data Base
    'dataBase'           => [
        'class'    => '\core\Database',
        'dsn'      => 'mysql:host=localhost;dbname=drm',
        'charset'  => 'utf8',
        'username' => 'root',
        'password' => '',
    ],
    'UrlManager'      => [
        'class' => '\core\UrlManager',
        'rules' => [
            // public
            '/' => 'home/index',
            // admin
            'admin/profil' => 'admin/index',
            'admin/new' => 'admin/new',
            'admin/connect' => 'admin/connect',
            'admin/disconnect' => 'admin/disconnect',
            'admin/update' => 'admin/update',
            // service
            'service' => 'service/index',
            'service/new' => 'service/new',
            // category
            'category' => 'category/index',
            'category/new' => 'category/new',
        ],
    ],
    'session'   => [
        'class' => '\core\Session'
    ],
    'request'   => [
        'class' => '\core\Request'
    ],
];
?>