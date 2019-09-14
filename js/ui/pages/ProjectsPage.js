/**
 * ProjectPage class manages 
 * the project-rendering
 * of the user
 * */
class ProjectsPage {
    /**
     * Error will be thrown if
     * a passed element not exist.
     * Saves the passed element and
     * registers events via registerEvents()
     * */
    constructor (element) {
      if (element) {
        this.element = element;
        this.registerEvents();
      };
    }
  
    /**
     * Call the render()
     * to render the page
     * */
    update () {
      this.render();
    }
  
    /**
     * Registers the events for
     * remove, delete, check and
     * translate buttons.
     * */
    registerEvents () {
      if (this.element.classList.contains('manager')) {

        this.element.addEventListener('click', e => {

          const id = e.target.closest('li').dataset.projectId;
  
          if (e.target.classList.contains('btn-delete')) {
            this.removeProject(id);
          } else if (e.target.classList.contains('btn-edit')) {
            this.getProject('edit', id);
          } else {
            if (e.target.closest('li').dataset.projectStatus !== 'new') {
              this.getProject('check', id);
            };            
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

    /**
     * Retrieves a unique project by its id
     * Uses get() method of Project's class
     * Upon successful response updates the form
     * and opens the modal
     * */

    getProject (mode, id) {
      Project.get({id}, (e, response) => {

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
     * Deletes a project. Displays a modal dialog.
     * If positive, call the Project.remove.
     * Upon success, call the App.update()
     * to update the app.
     * */
    removeProject (id) {
      let result = confirm('Are you sure you want to delete this project?');

      if (result) {
        Project.remove(id, (e, response) => {
          if (e === null && response) {
            App.update();
          };
        });
      }
    }
  
    /**
     * Fetch a list of projects with Project.list().
     * And passes the data to ProjectsPage.renderProjects().
     * */
    render (options = {}) {
      Page.list(options, (e, response) => {
        if (e === null && response) {
          this.renderProjects(response);
        };
      });
    }
  
    /**
     * Displays a list of projects on the page.
     * */
    renderProjects (projects) {
      this.element.innerHTML = projects;
    }
}