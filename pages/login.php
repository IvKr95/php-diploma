<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" href="../style/style.css" rel="stylesheet">
    <title>Authorize</title>
</head>
<body>
    <div class="modal">
        <?php

            if (isset($_GET['error'])) {

                if ($_GET['error'] === 'emptyfields') {
                    echo '<p>Fill in all fields!</p>';
                } elseif ($_GET['error'] === 'wrong_email_or_password') {
                    echo '<p>Wrong credentials!</p>';
                };
            };

        ?>
        <form enctype="multipart/form-data" class="login-form" action="../login.inc.php" method="post" name="login">
            <div class="form-field email">
                <label for="email">
                    <input type="text" name="email" placeholder="E-mail" required>
                </label>
            </div>
            <div class="form-field password">
                <label for="password">
                    <input type="password" name="password" placeholder="Password" required>
                </label>
            </div>
            <div class="form-field btn-submit">
                <button class="btn" type="submit" name="submit">
                    <p class="btn-text">Sign in</p>
                </button>
            </div>
        </form>
    </div>
</body>
</html>

