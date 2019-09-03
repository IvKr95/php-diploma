<?php

$users = require_once './users.php';

function isValid($users)
{
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    if (empty($email) || empty($pass)) {
        header('Location: ./forms/login.php?error=emptyfields');
    } elseif (array_key_exists($email, $users) && $users[$email] === $pass) {
        preg_match('/^\w+/', $email, $matches);
        header('HTTP/1.1 200 OK'); 
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/diploma/pages/' . $matches[0] . '.php');
    } else {
        header('Location: ./forms/login.php?error=wrong_email_or_password');
    };
    exit();
};

if (isset($_POST['submit'])) {
    isValid($users);
};


// if (isset($_GET['error'])) {

//     if ($_GET['error'] === 'emptyfields') {
//         echo '<p>Fill in all fields!</p>';
//     } elseif ($_GET['error'] === 'wrong_email_or_password') {
//         echo '<p>Wrong credentials!</p>';
//     };
// };
        