<?php

require_once '../classes/Interpreter.php';
$obj = new Interpreter;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/manager_styles.css">
    <title>Interpreter Interface</title>
</head>
<body class="interface">
    <div class="outer-wrapper">

        <header class="header">
            <nav class="nav">
                <ul class="menu">
                    <li class="menu-item">
                        <a class="menu-link menu-link_new" href="#">New</a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link menu-link_resolved" href="#">Resolved</a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link menu-link_rejected" href="#">Rejected</a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link menu-link_done" href="#">Done</a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link menu-link_exit" href="#">Exit</a>
                    </li>
                </ul>
            </nav>
        </header>

        <main class="main">
            <section class="content">
                <ul class="list">
                    <li class="list-item">
                        <div class="list-item_info">
                            <p class="deadline">21/02/2019</p>
                            <div class="target-lang_holder">
                                <span class="target-lang">EN</span>
                                <span class="target-lang">IT</span>
                            </div>
                        </div>
                        <p class="text">
                            Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев 
                            более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык 
                            публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный 
                            универсальный код речей...
                        </p>
                    </li>
                </ul>
            </section>
        </main>

    </div>

    <div class="modal" id="modal-translate">

        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-label="Закрыть">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="post" id="translation-form">
                    <div class="form-group">
                        <p>Язык оригинала:</p>
                        <span class="initial-lang"></span>
                    </div>
                    <div class="form-group">
                        <p>Языки перевода:</p>
                        <span class="bold target-lang"></span>
                        <span class="bold target-lang"></span>
                    </div>
                    <div class="form-group">
                        <label>
                            <p>Крайний срок</p>
                            <span class="bold deadline"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <p class="initial-lang_text" name="text" cols="30" rows="20"></p>
                    </div>
                    <div class="form-group">
                        <div class="target-lang_holder">
                            <span class="bold target-lang_name"></span>
                            <textarea class="target-lang_text" name="text" cols="30" rows="10"></textarea>
                        </div>
                        <div class="target-lang_holder">
                            <span class="bold target-lang_name"></span>
                            <textarea class="target-lang_text" name="text" cols="30" rows="10"></textarea>
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

            <div class="modal-footer">
                <button type="submit" class="btn btn-resolved" name="resolved" form="translation-form">Resolved</button>
                <button type="submit" class="btn btn-save" name="save" form="translation-form">Save</button>
            </div>
        </div>
        
    </div>

    <script src="../js/api/createRequest.js"></script>
    <script src="../js/api/Entity.js"></script>
    <script src="../js/api/Project.js"></script>
    <script src="../js/api/User.js"></script>

    <script src="../js/ui/Modal.js"></script>
    <script src="../js/ui/pages/ProjectList.js"></script>

    <script src="../js/ui/forms/AsyncForm.js"></script>
    <script src="../js/ui/forms/CreateProject.js"></script>

    <script src="../js/App.js"></script>

    <script>
        App.init();
    </script>
</body>
</html>