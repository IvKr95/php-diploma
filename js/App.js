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
  
      //this.initUser(); 
    }
  
    /**
     * Извлекает информацию о текущем пользователе
     * используя User.fetch(). В случае, если пользователь
     * авторизован, необходимо установить состояние
     * App.setState( 'user-logged' ).
     * Если пользователь не авторизован, необходимо установить
     * состояние 'init'
     * */
    // static initUser() {
    //   User.fetch({}, () =>
    //     this.setState( User.current() ? 'user-logged' : 'init' )
    //   );
    // }

    /**
     * Инициализирует единственную динамическую
     * страницу (для отображения проектов)
     * */
    static initPages() {
        this.pages = {
            projects : new ProjectsPage(this.content)
        }
    }
  
    /**
     * Инициализирует всплывающие окна
     * */
    static initModals() {
      this.modals = {
        createProject: new Modal(document.querySelector( '#modal-create' )),
      };
    }
  
    /**
     * Инициализирует формы
     * */
    static initForms() {
      this.forms = {
        createProjectForm: new CreateProjectForm(document.querySelector('#new-project-form')),
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
     * App.getPage( 'transactions' ); // извелекает App.pages.transactions
     * */
    static getPage(pageName) {
      return this.pages[pageName];
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
     * Получает страницу с помощью App.getPage
     * Вызывает у полученной страницы метод render()
     * и передаёт туда объект options
     * */
    static showPage(pageName, options) {
      const page = this.getPage(pageName);
      page.render(options);
    }

    /**
     * Обновляет содержимое страниц
     * Вызывает методы updateForms() и updatePages()
     * */

    static update() {
      this.updatePages();
        //this.updateForms();
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

    /**
     * Обновляет страницы
     * Обращается к единственной странице projects
     * через getPage и вызывает у этой страницы
     * метод update()
     * */

    static updateForms() {
        //this.getForm( 'editProjectForm' ).update();
        //this.getForm( 'checkProjectForm' ).update();
        // this.getForm( 'translationForm' ).update();
    }
}