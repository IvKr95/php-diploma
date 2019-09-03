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
                        <button type="button" class="menu-btn create">Create new</a>
                    </li>
                    <li class="menu-item">
                        <button type="button" class="menu-btn logout">Log out</a>
                    </li>
                </ul>
            </nav>
        </header>

        <main class="main">
            <section class="content">
                <ul class="projects-list manager">

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
                <form enctype="multipart/form-data" class="form" id="edit-project-form" action="../classes/Project.php" method="post" novalidate>
                    <input name="action" type="hidden" value="edit">
                    <input class="hidden projectId" name="project-id" type="hidden" value="">
                    <input class="status" name="status" type="hidden" value="">

                    <div class="form-group">
                        <label>
                            Ответственный:
                            <select class="form-control assignment" name="assignment" required>
                                <option class="assignee" value="Сидорова Сидора">Сидорова Сидора</option>
                                <option class="assignee" value="Петрович Петр">Петрович Петр</option>
                                <option class="assignee" value="Иванов Иван">Иванов Иван</option>
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
                            <input type="radio" class="form-control radio" name="initial-lang" value="Russian">
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
                            <input type="checkbox" class="form-control checkbox" name="target-lang[]" value="English">
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
                    <div class="form-group">
                        <label>
                            Крайний срок
                            <input type="text" class="form-control deadline" name="deadline" placeholder="10/10/2019">
                        </label>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
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
                <form enctype="multipart/form-data" class="form" id="check-project-form" action="../classes/Project.php" method="post" novalidate>

                    <input name="type" type="hidden" value="">
                    <input name="action" type="hidden" value="check">
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
                <button type="submit" class="form-control btn rejected-btn" name="submit" form="check-project-form">Rejected</button>
                <button type="submit" class="form-control btn done-btn" name="submit" form="check-project-form">Done</button>
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
        App.showPage();

        const create = document.querySelector('.create');

        create.addEventListener('click', e => {

            const modal = App.getModal('createProject');
            modal.open();
            e.preventDefault();
        });

        const elements = document.forms['check-project-form'].elements;
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
            } else if (btn.classList.contains('all')) {
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