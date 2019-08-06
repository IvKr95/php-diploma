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
    <div class="form-holder">
        <form action="" method="post">
            <div>
                <label for="assignment">
                    Ответственный:
                    <select id="assignment" name="assignment">
                        <?php ?>
                    </select>
                </label>
            </div>
            <div>
                <label for="client">
                    Клиент:
                    <input type="text" id="client" name="client">
                </label>
            </div>
            <div>
                <p>Язык оригинала:</p>
                <label for="radio1">
                    <input type="radio" id="radio1" name="initial-lang" value="russian" <?php?>>
                    Русский
                </label>
                <label for="radio2">
                    <input type="radio" id="radio2" name="initial-lang" value="english">
                    Английский
                </label>
                <label for="radio3">
                    <input type="radio" id="radio3" name="initial-lang" value="german">
                    Немецкий
                </label>
                <label for="radio4">
                    <input type="radio" id="radio4" name="initial-lang" value="french">
                    Француский
                </label>
                <label for="radio5">
                    <input type="radio" id="radio5" name="initial-lang" value="italian">
                    Итальянский
                </label>
                <label for="radio6">
                    <input type="radio" id="radio6" name="initial-lang" value="spanish">
                    Испанский
                </label> 
            </div>
            <div>
                <p>Язык перевода:</p>
                <label for="russian">
                    <input type="checkbox" id="russian" name="target-lang" value="russian">
                    Русский
                </label>
                <label for="english">
                    <input type="checkbox" id="english" name="target-lang" value="english" <?php?>>
                    Английский
                </label>
                <label for="german">
                    <input type="checkbox" id="german" name="target-lang" value="german">
                    Немецкий
                </label>
                <label for="french">
                    <input type="checkbox" id="french" name="target-lang" value="french">
                    Француский
                </label>
                <label for="italian">
                    <input type="checkbox" id="italian" name="target-lang" value="italian">
                    Итальянский
                </label>
                <label for="spanish">
                    <input type="checkbox" id="spanish" name="target-lang" value="spanish">
                    Испанский
                </label>
            </div>
            <div>
                <textarea name="text" cols="60" rows="50"><?php?></textarea>
            </div>
            <div>
                <button type="submit" name="done">Done</button>
            </div>
            <div>
                <button type="reset" name="reset">Reset</button>
            </div>
            <div>
                <label for="deadline">
                    Крайний срок
                    <input type="text" id="deadline" name="deadline" value="<?php?>" placeholder="10/10/2019" required>
                </label>
            </div>
            <div>
                <button type="submit" name="save">Save</button>
            </div>
        </form>
    </div>
</body>
</html>