<?php
    require_once './header.php';
    require_once './sidebar.php';
    require_once './main.php';
?>
        
    <div class="modal" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button class="btn close close-btn">
                        <span>&times;</span>
                    </button>
                    <h4 class="modal-title">New Project</h4>
                </div>

                <div class="modal-body">
                    <form enctype="multipart/form-data" class="form" id="new-project-form" action="../classes/Project.php" method="post" novalidate>
                        <input name="action" type="hidden" value="create">
                        <div class="form-group">
                            <label for="assignment">Ответственный:</label>
                                <select class="form-control assignment" name="assignment" id="assignment">
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="client">Клиент:</label>
                            <input type="text" class="form-control client" name="client" id="client">
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
                            <textarea name="text" class="form-control initial-lang_text"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="deadline">Крайний срок:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="date" class="form-control pull-right deadline" name="deadline" id="deadline">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success save-btn" name="save" form="new-project-form">Create</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button class="btn close close-btn">
                        <span>&times;</span>
                    </button>
                    <h4 class="modal-title">Edit Project</h4>
                </div>

                <div class="modal-body">
                    <form enctype="multipart/form-data" class="form" id="edit-project-form" action="../classes/Project.php" method="post" novalidate>
                        <input name="action" type="hidden" value="edit">
                        <input class="hidden projectId" name="project-id" type="hidden" value="">
                        <input class="status" name="status" type="hidden" value="">

                        <div class="form-group">
                            <label for="assignment">Ответственный:</label>
                            <select class="form-control assignment" name="assignment" id="assignment" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="client">Клиент:</label>
                            <input type="text" class="form-control client" name="client" id="client">
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
                            <textarea name="text" class="form-control initial-lang_text"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="deadline">Крайний срок:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="date" class="form-control pull-right deadline" name="deadline" id="deadline">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="form-control btn btn-success save-btn" name="save" form="edit-project-form">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-check">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button class="btn close close-btn">
                        <span>&times;</span>
                    </button>
                    <h4 class="modal-title">Check Project</h4>
                </div>

                <div class="modal-body">
                    <form enctype="multipart/form-data" class="form" id="check-project-form" action="../classes/Project.php" method="post" novalidate>

                        <input name="type" type="hidden" value="">
                        <input name="action" type="hidden" value="check">
                        <input class="hidden projectId" name="project-id" type="hidden" value="">

                        <div class="form-group">
                            Язык оригинала:
                            <span class="lang initial-lang"></span>
                        </div>
                        <div class="form-group">
                            Язык перевода:
                            <span class="lang target-lang"></span>
                        </div>
                        <div class="form-group">
                            Крайний срок
                            <span class="deadline"></span>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control initial-lang_text" readonly></textarea>
                        </div>
                        <div class="form-group">
                            <div class="target-lang_holder">
                            
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="form-control btn btn-danger rejected-btn" name="submit" form="check-project-form">Reject</button>
                    <button type="submit" class="form-control btn btn-success done-btn" name="submit" form="check-project-form">Done</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/api/createRequest.js"></script>
    <script src="../js/api/Entity.js"></script>
    <script src="../js/api/Page.js"></script>
    <script src="../js/api/Project.js"></script>
    <script src="../js/api/Interpreters.js"></script>

    <script src="../js/ui/Modal.js"></script>
    <script src="../js/ui/pages/ProjectsPage.js"></script>

    <script src="../js/ui/forms/AsyncForm.js"></script>
    <script src="../js/ui/forms/CreateProjectForm.js"></script>
    <script src="../js/ui/forms/EditProjectForm.js"></script>
    <script src="../js/ui/forms/CheckProjectForm.js"></script>

    <script src="../js/ui/forms/TranslateProjectForm.js"></script>

    <script src="../js/ui/Sidebar.js"></script>
    <script src="../js/App.js"></script>

    <script>
        App.init();
        App.showPage();

        const create = document.querySelector('.create');

        create.addEventListener('click', e => {
            const modal = App.getModal('createProject');
            const form = App.getForm('createProjectForm');

            Interpreters.get({}, (e, response) => {
                if (e === null && response) {
                    form.update(response);
                    modal.open();
                };
            });

            e.preventDefault();
        });

        const elements = document.forms['check-project-form'].elements;
        const submitBtns = [...elements.submit];

        submitBtns.forEach( btn => {
            btn.addEventListener('click', e => {
                elements.type.value = e.target.textContent;
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>