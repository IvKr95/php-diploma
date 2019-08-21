<?php

session_start();

require_once '../autoload.php';
require_once '../config/Config.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/manager_styles.css">
    <title>Manager Interface</title>
</head>
<body class="interface">
    <div class="outer-wrapper">
        <header class="header">
            <nav class="nav">
                <ul class="menu">
                    <li class="menu-item">
                        <button type="button" class="menu-btn new">New</a>
                    </li>
                    <li class="menu-item">
                        <button type="button" class="menu-btn resolved">Resolved</a>
                    </li>
                    <li class="menu-item">
                        <button type="button" class="menu-btn rejected">Rejected</a>
                    </li>
                    <li class="menu-item">
                        <button type="button" class="menu-btn done">Done</a>
                    </li>
                    <li class="menu-item">
                        <button type="button" class="menu-btn create">Create new</a>
                    </li>
                    <li class="menu-item">
                        <button type="button" class="menu-btn exit">Exit</a>
                    </li>
                </ul>
            </nav>
        </header>

        <main class="main">
            <section class="content">
                <ul class="projects-list">

                </ul>
            </section>
        </main>
    </div>

    <div class="modal" id="modal-create">

        <div class="modal-content">
            <div class="modal-header">
                <button class="btn close-btn" aria-label="Закрыть">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form enctype="multipart/form-data" class="form" id="new-project-form" action="../classes/Project.php" method="post" novalidate>
                    <input name="action" type="hidden" value="create">
                    <div class="form-group">
                        <label>
                            Ответственный:
                            <select class="form-control assignment" name="assignment">
                                <option value="Сидорова Сидора">Сидорова Сидора</option>
                                <option value="Петрович Петр">Петрович Петр</option>
                                <option value="Иванов Иван">Иванов Иван</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Клиент:
                            <input type="text" class="form-control client" name="client">
                        </label>
                    </div>
                    <div class="form-group">
                        <p>Язык оригинала:</p>
                        <label>
                            <input type="radio" class="form-control radio" name="initial-lang" value="Russian" checked>
                            Русский
                        </label>
                        <label>
                            <input type="radio" class="form-control radio" name="initial-lang" value="English">
                            Английский
                        </label>
                        <label>
                            <input type="radio" class="form-control radio" name="initial-lang" value="German">
                            Немецкий
                        </label>
                        <label>
                            <input type="radio" class="form-control radio" name="initial-lang" value="French">
                            Француский
                        </label>
                        <label>
                            <input type="radio" class="form-control radio" name="initial-lang" value="Italian">
                            Итальянский
                        </label>
                        <label>
                            <input type="radio" class="form-control radio" name="initial-lang" value="Spanish">
                            Испанский
                        </label> 
                    </div>
                    <div class="form-group">
                        <p>Язык перевода:</p>
                        <label>
                            <input type="checkbox" class="form-control checkbox" name="target-lang[]" value="Russian">
                            Русский
                        </label>
                        <label>
                            <input type="checkbox" class="form-control checkbox" name="target-lang[]" value="English" checked>
                            Английский
                        </label>
                        <label>
                            <input type="checkbox" class="form-control checkbox" name="target-lang[]" value="German">
                            Немецкий
                        </label>
                        <label>
                            <input type="checkbox" class="form-control checkbox" name="target-lang[]" value="French">
                            Француский
                        </label>
                        <label>
                            <input type="checkbox" class="form-control checkbox" name="target-lang[]" value="Italian">
                            Итальянский
                        </label>
                        <label>
                            <input type="checkbox" class="form-control checkbox" name="target-lang[]" value="Spanish">
                            Испанский
                        </label>
                    </div>
                    <div class="form-group">
                        <textarea name="text" class="form-control initial-lang_text" cols="20" rows="10"></textarea>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <div class="form-group">
                    <label>
                        Крайний срок
                        <input type="text" class="form-control deadline" name="deadline" placeholder="10/10/2019" form="new-project-form">
                    </label>
                </div>
                <button type="submit" class="form-control btn save-btn" name="save" form="new-project-form">Save</button>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-edit">

        <div class="modal-content">
            <div class="modal-header">
                <button class="btn close-btn" aria-label="Закрыть">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="edit-project-form" action="" method="post">
                    <div class="form-group">
                        <label>
                            Ответственный:
                            <select class="form-control assignment" name="assignment">
                                <option value="sidora">Сидорова Сидора</option>
                                <option value="petr">Петрович Петр</option>
                                <option value="ivanov">Иванов Иван</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Клиент:
                            <input type="text" class="form-control client" name="client">
                        </label>
                    </div>
                    <div class="form-group">
                        <p>Язык оригинала:</p>
                        <label>
                            <input type="radio" class="form-control radio" name="initial-lang" value="russian">
                            Русский
                        </label>
                        <label>
                            <input type="radio" class="form-control radio" name="initial-lang" value="english">
                            Английский
                        </label>
                        <label>
                            <input type="radio" class="form-control radio" name="initial-lang" value="german">
                            Немецкий
                        </label>
                        <label>
                            <input type="radio" class="form-control radio" name="initial-lang" value="french">
                            Француский
                        </label>
                        <label>
                            <input type="radio" class="form-control radio" name="initial-lang" value="italian">
                            Итальянский
                        </label>
                        <label>
                            <input type="radio" class="form-control radio" name="initial-lang" value="spanish">
                            Испанский
                        </label> 
                    </div>
                    <div class="form-group">
                        <p>Язык перевода:</p>
                        <label>
                            <input type="checkbox" class="form-control checkbox" name="target-lang" value="russian">
                            Русский
                        </label>
                        <label>
                            <input type="checkbox" class="form-control checkbox" name="target-lang" value="english">
                            Английский
                        </label>
                        <label>
                            <input type="checkbox" class="form-control checkbox" name="target-lang" value="german">
                            Немецкий
                        </label>
                        <label>
                            <input type="checkbox" class="form-control checkbox" name="target-lang" value="french">
                            Француский
                        </label>
                        <label>
                            <input type="checkbox" class="form-control checkbox" name="target-lang" value="italian">
                            Итальянский
                        </label>
                        <label>
                            <input type="checkbox" class="form-control checkbox" name="target-lang" value="spanish">
                            Испанский
                        </label>
                    </div>
                    <div class="form-group">
                        <textarea name="text" class="form-control text" cols="60" rows="50"></textarea>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <div class="form-group">
                    <label>
                        Крайний срок
                        <input type="text" class="form-control deadline" name="deadline" placeholder="10/10/2019" form="edit-project-form" required>
                    </label>
                </div>
                <button type="submit" class="form-control btn save-btn" name="save" form="edit-project-form">Save</button>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-check">

        <div class="modal-content">
            <div class="modal-header">
                <button class="btn close-btn" aria-label="Закрыть">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        
        <div class="modal-body">
            <form id="check-project-form" action="" method="get">
                <div class="form-group">
                    <p>Язык оригинала:</p>
                    <span class="initial-lang"></span>
                </div>
                <div class="form-group">
                    <p>Языки перевода:</p>
                    <span class="target-lang"></span>
                </div>
                <div class="form-group">
                    <label>
                        <p>Крайний срок</p>
                        <span></span>
                    </label>
                </div>
                <div class="form-group">
                    <textarea class="form-control initial-lang-text" name="text" cols="30" rows="20"></textarea>
                </div>
                <div class="form-group">
                    <div class="lang-holder">
                        <span></span>
                        <textarea name="text" class="form-control target-lang-text" cols="30" rows="10"></textarea>
                    </div>
                    <div class="lang-holder">
                        <span></span>
                        <textarea name="text" class="form-control target-lang-text" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div>
                    <button type="submit" class="form-control btn resolved-btn" name="resolved">Resolved</button>
                </div>
                <div>
                    <button type="submit" class="form-control btn save-btn" name="save">Save</button>
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <button type="submit" class="form-control btn reject-btn" name="reject" form="check-project-form">Reject</button>
            <button type="submit" class="form-control btn done-btn" name="done" form="check-project-form">Done</button>
        </div>
        
    </div>

    <script src="../js/api/createRequest.js"></script>
    <script src="../js/api/Entity.js"></script>
    <script src="../js/api/Page.js"></script>
    <script src="../js/api/Project.js"></script>

    <script src="../js/ui/Modal.js"></script>
    <script src="../js/ui/pages/ProjectsPage.js"></script>

    <script src="../js/ui/forms/AsyncForm.js"></script>
    <script src="../js/ui/forms/CreateProjectForm.js"></script>

    <script src="../js/App.js"></script>

    <script>
        App.init();
        App.update();

        const createBtn = document.querySelector('.create');

        createBtn.addEventListener('click', e => {
            const modal = App.getModal('createProject');
            const form = App.getForm('createProjectForm');
            modal.open();
        });
    </script>
</body>
</html>