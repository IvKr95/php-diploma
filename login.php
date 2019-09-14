<?php

if (isset($_POST['submit'])) {

    require './dbh.php';

    $email = trim($_POST['email']);
    $pwd = trim($_POST['password']);

    if (empty($email) || empty($pwd)) {
        header("Location: ./pages/login.php?error=emptyfields");
        exit();
    } else {
        $query = "SELECT * FROM users WHERE emailUsers=?;";
        $stmt = mysqli_stmt_init($connect);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ./pages/login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = ($pwd === $row['pwdUsers']);

                if ($pwdCheck === false) {
                    header("Location: ./pages/login.php?error=wrongpwd");
                    exit();
                } else {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['name'] = $row['uidUsers'];
                    $_SESSION['role'] = $row['uRole'];

                    header("Location: ./pages/" . $_SESSION['role'] . ".php");
                    exit();
                };
            } else {
                header("Location: ./pages/login.php?error=nouser");
                exit();
            };
        };
    };
} else {
    header('Location: ./pages/login.php');
    exit();
};