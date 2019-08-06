<?php

require_once 'autoload.php';
require_once 'config/Config.php';

$users = [
    'manager@mail.com' => 'manager',
    'interpreter@mail.ru' => 'interpreter'
];

function isExist($users)
{
    if (isset($_POST['submit'])) {

        $login = trim($_POST['email']);
        $pass = trim($_POST['password']);
    
        if ($login === 'manager@mail.com' && $users[$login] === $pass) {
            header('Location: ./pages/manager.php');
        } elseif ($login === 'interpreter@mail.ru' && $users[$login] === $pass) {
            header('Location: ./pages/interpreter.php');
        } else {
            throw new Exception('User Not Exist');
        };
    };
};

try {
    isExist($users);
} catch (Exception $e) {
    echo $e->getMessage();
};