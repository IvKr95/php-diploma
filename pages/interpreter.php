<?php
    require_once './header.php';
    require_once './sidebar.php';
    require_once './main.php';
?>

    <div class="modal" id="modal-translate">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button class="btn close close-btn">
                        <span>&times;</span>
                    </button>
                    <h4 class="modal-title">Translate Project</h4>
                </div>

                <div class="modal-body">
                    <form enctype="multipart/form-data" class="form" id="translate-project-form" action="../classes/Project.php" method="post" novalidate>

                        <input name="type" type="hidden" value="">
                        <input name="action" type="hidden" value="translate">
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
                            Крайний срок:
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
                    <button type="submit" class="btn btn-success resolved-btn" name="submit" form="translate-project-form">Resolved</button>
                    <button type="submit" class="btn btn-success save-btn" name="submit" form="translate-project-form">Save</button>
                </div>
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

    <script src="../js/ui/Sidebar.js"></script>
    <script src="../js/App.js"></script>

    <script>
        App.init();
        App.showPage();

        const elements = document.forms['translate-project-form'].elements;
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