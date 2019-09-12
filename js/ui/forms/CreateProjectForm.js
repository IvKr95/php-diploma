/**
 * Класс CreateProjectForm управляет формой
 * создания нового проекта
 * Наследуется от AsyncForm
 * */
class CreateProjectForm extends AsyncForm {
    /**
     * Вызывает родительский конструктор
     * */
    constructor (element) {
      super(element);
    }

    update (data) {
      const select = this.element.querySelector('.assignment');
      select.innerHTML = data;
    }
  
    /**
     * Создаёт новую проект с помощью Project.create. 
     * По успешному результату вызывает App.update(),
     * сбрасывает форму и закрывает окно,
     * в котором находится форма
     * */
    onSubmit (options) {
      Project.create(options, ( e, response ) => {
        if (e === null && response) {
          App.update();
          this.element.reset();
          const modal = App.getModal('createProject');
          modal.close();
        };  
      });
    }
}
  