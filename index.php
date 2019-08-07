<?php

require_once 'autoload.php';
require_once 'config/Config.php';
$users = require_once './users.php';

const MANAGER = 'manager@mail.com';

function isExist($users)
{
    if (isset($_POST['submit'])) {

        $login = trim($_POST['email']);
        $pass = trim($_POST['password']);
        
        if ($login === MANAGER && $pass === $users[$login]) {
            header('Location: ./pages/manager.php');
        } elseif (array_key_exists($login, $users) && $users[$login] === $pass) {
            preg_match('/^\w+/', $login, $matches);
            header("Location: ./pages/$matches[0].php");
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