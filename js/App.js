/**
 * Класс App управляет всем приложением
 * */
class App {
    /**
     * С вызова этого метода начинается работа всего приложения
     * */
    static init() {
      this.element = document.querySelector( '.interface' );
      this.content = document.querySelector( '.projects-list' );
  
      this.initPages();
      this.initForms();
      this.initModals();
    }

    /**
     * Инициализирует единственную динамическую
     * страницу (для отображения проектов)
     * */
    static initPages() {
        this.pages = {
            projects: new ProjectsPage(this.content)
        }
    }
  
    /**
     * Инициализирует всплывающие окна
     * */
    static initModals() {
      this.modals = {
        createProject: new Modal(document.querySelector('#modal-create')),
        editProject: new Modal(document.querySelector('#modal-edit')),
        translateProject: new Modal(document.querySelector('#modal-translate')),
        checkProject: new Modal(document.querySelector('#modal-check')),
      };
    }
  
    /**
     * Инициализирует формы
     * */
    static initForms() {
      this.forms = {
        createProjectForm: new CreateProjectForm(document.querySelector('#new-project-form')),
        editProjectForm: new EditProjectForm(document.querySelector('#edit-project-form')),
        translateProjectForm: new TranslateProjectForm(document.querySelector('#translate-project-form')),
        checkProjectForm: new CheckProjectForm(document.querySelector('#check-project-form')),
      }
    }
  
    /**
     * Возвращает всплывающее окно
     * Обращается к объекту App.modals и извлекает
     * из него свойство modalName:
     * App.getModal( 'createProject' ); // извелекает App.modals.createProject
     * */
    static getModal(modalName) {
      return this.modals[modalName];
    }
  
    /**
     * Возвращает страницу
     * Обращается к объекту App.pages и извлекает
     * из него свойство pageName:
     * App.getPage( 'projects' ); // извелекает App.pages.projects
     * */
    static getPage(pageName) {
      return this.pages[pageName];
    }

    /**
     * Получает страницу с помощью App.getPage
     * Вызывает у полученной страницы метод render()
     * и передаёт туда объект options
     * */
    static showPage (options) {

      if (options) {
        options = {
          interpreter: options
        };
      };
      
      const page = this.getPage('projects');
      page.render(options);
    }

    /**
     * Возвращает форму по названию
     * Обращается к объекту App.forms и извлекает
     * из него свойство formName
     * */
    static getForm(formName) {
      return this.forms[formName];
    }

    /**
     * Обновляет содержимое страниц
     * Вызывает методы updateForms() и updatePages()
     * */

    static update() {
      this.updatePages();
    }

    /**
     * Обновляет страницы
     * Обращается к единственной странице projects
     * через getPage и вызывает у этой страницы
     * метод update()
     * */

    static updatePages() {
      this.getPage('projects').update();
    }
}