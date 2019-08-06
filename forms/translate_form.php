<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="form_holder">
        <form action="" method="post">
            <div>
                <p>Язык оригинала:</p>
                <span class="initial_lang"><?php?></span>
            </div>
            <div>
                <p>Языки перевода:</p>
                <span><?php ?></span>
            </div>
            <div>
                <label for="deadline">
                    <p>Крайний срок</p>
                    <span><?php?></span>
                </label>
            </div>
            <div class="initial_lang-holder">
                <textarea name="text" cols="30" rows="20"><?php?></textarea>
            </div>
            <div>
                <div>
                    <span><?php?></span>
                    <textarea name="text" cols="30" rows="10"><?php?></textarea>
                </div>
                <div>
                    <span><?php?></span>
                    <textarea name="text" cols="30" rows="10"><?php?></textarea>
                </div>
            </div>
            <div>
                <button type="submit" name="resolved">Resolved</button>
            </div>
            <div>
                <button type="submit" name="save">Save</button>
            </div>
        </form>
    </div>
</body>
</html>