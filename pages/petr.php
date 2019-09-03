<?php

define('INTERPRETER', 'Петрович Петр');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/interpreter.css">
    <title>Interpreter Interface</title>
</head>
<body class="interface">
    <div class="outer-wrapper">
        <header class="header">
            <nav class="nav">
                <ul class="menu">
                    <li class="menu-item">
                        <button type="button" class="menu-btn all">All</a>
                    </li>
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
                        <button type="button" class="menu-btn logout">Log out</a>
                    </li>
                </ul>
            </nav>
        </header>

        <main class="main">
            <section class="content">
                <ul class="projects-list interpreter">

                </ul>
            </section>
        </main>
    </div>

    <div class="modal" id="modal-translate">

        <div class="modal-content">

            <div class="modal-header">
                <button class="btn close-btn" aria-label="Закрыть">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form enctype="multipart/form-data" class="form" id="translate-project-form" action="../classes/Project.php" method="post" novalidate>

                    <input name="type" type="hidden" value="">
                    <input name="action" type="hidden" value="translate">
                    <input class="hidden projectId" name="project-id" type="hidden" value="">

                    <div class="form-group">
                        <p>Язык оригинала:</p>
                        <span class="lang initial-lang"></span>
                    </div>
                    <div class="form-group">
                        <p>Язык перевода:</p>
                        <span class="lang target-lang"></span>
                    </div>
                    <div class="form-group">
                        <p>Крайний срок</p>
                        <span class="deadline"></span>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control initial-lang_text" cols="80" rows="5" readonly></textarea>
                    </div>
                    <div class="form-group">
                        <div class="target-lang_holder">
                        
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="form-control btn resolved-btn" name="submit" form="translate-project-form">Resolved</button>
                <button type="submit" class="form-control btn save-btn" name="submit" form="translate-project-form">Save</button>
            </div>
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
    <script src="../js/ui/forms/EditProjectForm.js"></script>
    <script src="../js/ui/forms/CheckProjectForm.js"></script>
    <script src="../js/ui/forms/TranslateProjectForm.js"></script>

    <script src="../js/App.js"></script>

    <script>
        App.init();
        App.showPage('<?= INTERPRETER ?>');

        const elements = document.forms['translate-project-form'].elements;
        const submitBtns = [...elements.submit];

        submitBtns.forEach( btn => {
            btn.addEventListener('click', e => {
                elements.type.value = e.target.textContent;
            });
        });

        const btns = document.querySelectorAll('.menu-btn');

        btns.forEach( btn => {
            
            if (btn.classList.contains('new')) {
                
                btn.addEventListener('click', e => {
                    const projects = document.querySelectorAll('.project');
                    projects.forEach( project => {
                        if (project.dataset.projectStatus !== 'new') {
                            project.style.display = 'none';
                        } else {
                            project.style.display = 'flex';
                        }
                    });
                });
            } else if (btn.classList.contains('resolved')) {
                
                btn.addEventListener('click', e => {
                    const projects = document.querySelectorAll('.project');
                    projects.forEach( project => {
                        if (project.dataset.projectStatus !== 'resolved') {
                            project.style.display = 'none';
                        } else {
                            project.style.display = 'flex';
                        }
                    });
                });
            } else if (btn.classList.contains('done')) {
                
                btn.addEventListener('click', e => {
                    const projects = document.querySelectorAll('.project');
                    projects.forEach( project => {
                        if (project.dataset.projectStatus !== 'done') {
                            project.style.display = 'none';
                        } else {
                            project.style.display = 'flex';
                        }
                    });
                });
            } else if (btn.classList.contains('rejected')) {
                
                btn.addEventListener('click', e => {
                    const projects = document.querySelectorAll('.project');
                    projects.forEach( project => {
                        if (project.dataset.projectStatus !== 'rejected') {
                            project.style.display = 'none';
                        } else {
                            project.style.display = 'flex';
                        }
                    });
                });
            } else {
                btn.addEventListener('click', e => {
                    const projects = document.querySelectorAll('.project');
                    projects.forEach( project => {
                        project.style.display = 'flex';
                    });
                });
            };
        });
    </script>
</body>
</html>