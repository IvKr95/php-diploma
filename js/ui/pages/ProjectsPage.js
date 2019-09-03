/**
 * Класс ProjectsPage управляет
 * страницей отображения проектов
 * конкретного пользователя
 * */
class ProjectsPage {
    /**
     * Если переданный элемент не существует,
     * необходимо выкинуть ошибку.
     * Сохраняет переданный элемент и регистрирует события
     * через registerEvents()
     * */
    constructor (element) {
      if (element) {
        this.element = element;
        this.registerEvents();
      };
    }
  
    /**
     * Вызывает метод render для отрисовки страницы
     * */
    update () {
      this.render();
    }
  
    /**
     * Отслеживает нажатие на кнопку удаления проета.
     * Внутри обработчика пользуюсь
     * методом ProjectsPage.removeProject
     * */
    registerEvents () {
      if (this.element.classList.contains('manager')) {

        this.element.addEventListener('click', e => {

          if (e.target.closest('li').dataset.projectStatus === 'done') return;

          const id = e.target.closest('li').dataset.projectId;
  
          if (e.target.classList.contains('btn-delete')) {
            this.removeProject(id);
          } else if (e.target.classList.contains('btn-edit')) {
            this.getProject('edit', id);
          } else {
            this.getProject('check', id);
          };
  
          e.preventDefault();
        });
      } else {
        this.element.addEventListener('click', e => {

          if (e.target.closest('li').dataset.projectStatus === 'done') return;

          const id = e.target.closest('li').dataset.projectId;

          this.getProject('translate', id);
          e.preventDefault();
        });
      };
    }

    getProject (mode, id) {
      Project.get({id}, (e, response) => {
        console.log('check');
        if (e === null && response) {

          let modal, form; 

          if (mode === 'edit') {

            [modal, form] = [App.getModal('editProject'), App.getForm('editProjectForm')];

          } else if (mode === 'translate') {

            [modal, form] = [App.getModal('translateProject'), App.getForm('translateProjectForm')];

          } else if (mode === 'check') {
            
            [modal, form] = [App.getModal('checkProject'), App.getForm('checkProjectForm')];
          };

          form.update(id, response);
          modal.open();
        };
      });
    }
  
    /**
     * Удаляет проект. Необходимо показать диаголовое окно (с помощью confirm())
     * Если пользователь согласен удалить проект, вызываем Project.remove.
     * По успешному удалению необходимо вызвать метод App.update()
     * для обновления приложения
     * */
    removeProject (id) {
      let result = confirm('Вы согласны удалить данный проект?');

      if (result) {
        Project.remove(id, (e, response) => {
          if (e === null && response) {
            App.update();
          };
        });
      }
    }
  
    /**
     * Получает список Project.list и полученные данные передаёт
     * в ProjectsPage.renderProjects()
     * */
    render (options = {}) {
      Page.list(options, (e, response) => {
        if (e === null && response) {
          this.renderProjects(response);
        };
      });
    }
  
    /**
     * Отрисовывает список проектов на странице
     * */
    renderProjects (projects) {
      this.element.innerHTML = projects;
    }
}