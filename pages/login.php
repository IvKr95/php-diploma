<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link type="text/css" href="../style/login-page.css" rel="stylesheet">
    <title>Sign in</title>
</head>
<body class="text-center">
           
    <form enctype="multipart/form-data" class="form-signin" action="../login.php" method="post" name="login">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] === 'emptyfields') {
                    echo '<p class="text-danger">Fill in all fields!</p>';
                } elseif ($_GET['error'] === 'nouser') {
                    echo '<p class="text-danger">User Not Exist</p>';
                } elseif ($_GET['error'] === 'wrongpwd') {
                    echo '<p class="text-danger">Wrong Password</p>';
                };
            };
        ?>
        <div class="form-group email">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        </div>

        <div class="form-group password">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>