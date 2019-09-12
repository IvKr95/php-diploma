/**
 * App class manages the whole app.
 * */
class App {
    /**
     * Initiates all the procedures in the app.
     * */
    static init() {
      this.element = document.querySelector( '.interface' );
      this.content = document.querySelector( '.projects-list' );
  
      this.initPages();
      this.initForms();
      this.initModals();

      Sidebar.init();
    }

    /**
     * Initiates the only dynamic page.
     * */
    static initPages() {
        this.pages = {
            projects: new ProjectsPage(this.content)
        }
    }
  
    /**
     * Initiates the modal windows.
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
     * Initiates the forms.
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
     * Returns a modal.
     * Refers to the App.modals object
     * and retrieves the property 'modalName':
     * App.getModal( 'createProject' ); // gets App.modals.createProject.
     * */
    static getModal(modalName) {
      return this.modals[modalName];
    }
  
    /**
     * Returns the page.
     * Refers to the App.pages object
     * and retrieves the property 'pageName':
     * App.getPage( 'projects' ); // gets App.pages.projects.
     * */
    static getPage(pageName) {
      return this.pages[pageName];
    }

    /**
     * Gets the page with the App.getPage.
     * Calls the render() method of the fetched page.
     * */
    static showPage () {      
      const page = this.getPage('projects');
      page.render();
    }

    /**
     * Returns a form by its name.
     * Refers to App.forms object and
     * retrieves the formName property.
     * */
    static getForm(formName) {
      return this.forms[formName];
    }

    /**
     * Updates the page content.
     * Calls updatePages().
     * */
    static update() {
      this.updatePages();
    }

    /**
     * Update pages.
     * Refers to the only page 'projects'
     * via getPage() and calls update() method
     * of this page.
     * */
    static updatePages() {
      this.getPage('projects').update();
    }
}