<?php
return array( 'routes' => array(
        '/' => array(
            'call' => 'Oss/controller/OssController.php',
            'view' => 'Oss/view/index.php',
            'name' => 'OssController'
        ),
        '/users' => array(
            'call' => 'User/controller/UserController.php',
            'view' => 'User/view/users.php',
            'name' => 'UserController'
        ),
        '/adduser' => array(
            'call' => 'User/controller/UserController.php',
            'view' => 'User/view/adduser.php',
            'name' => 'UserController'
        ),
        '/computeSaveUser' => array(
            'call' => 'User/controller/UserController.php',
            'view' => 'User/view/computeSaveUser.php',
            'name' => 'UserController'
        ),
        '/user/adress/*' => array(
            'call' => 'User/controller/AdressController.php',
            'view' => 'User/view/adressUsers.php',
            'name' => 'AdressController'
        )
    ),
);