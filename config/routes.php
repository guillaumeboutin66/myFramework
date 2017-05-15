<?php
return array( 'routes' => array(
        '/' => array(
            'call' => 'Oss/controller/OssController.php',
            'view' => 'Oss/view/index.php',
            'name' => 'OssController'
        ),
        '/users' => array(
            'call' => 'Oss/controller/OssController.php',
            'view' => 'Oss/view/users.php',
            'name' => 'OssController'
        )
    ),
);