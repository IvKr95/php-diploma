/**
 * Класс EditProjectForm управляет формой
 * редактирования проекта
 * Наследуется от AsyncForm
 * */
class EditProjectForm extends AsyncForm {
    /**
     * Вызывает родительский конструктор
     * */
    constructor (element) {
        super(element);
    }

    update (id, data) {
        this.updateFields(id, data);
        this.updateAssignee(data.assignment);
        this.updateRadios(data['initial-lang']);
        this.updateCheckboxes(data['target-lang']); 
    }

    updateFields (id, data) {
        this.element.querySelector('.client').value = data.client;
        this.element.querySelector('.initial-lang_text').value = data.text;
        this.element.querySelector('.deadline').value = data.deadline;
        this.element.querySelector('.projectId').value = id;
        this.element.querySelector('.status').value = data.status;
    }

    updateAssignee (assignee) {
        const select = this.element.querySelector('.assignment'),
                opts = select.options;

        for (let opt, i = 0; opt = opts[i]; i++) {
            if (opt.value === assignee) {
                select.selectedIndex = i;
                break;
            };
        };
    }

    updateRadios (initLang) {
        const radios = [...this.element.querySelectorAll('.radio')];

        radios.forEach( radio => {
            radio.value === initLang ? radio.checked = true : radio.checked = false;
        });
    }

    updateCheckboxes (targetLang) {
        const cs = [...this.element.querySelectorAll('.checkbox')];

        cs.forEach( c => {
            targetLang.includes(c.value) ? c.checked = true : c.checked = false;
        });
    }
  
    /**
     * Редактирует проект с помощью Project.update. 
     * По успешному результату вызывает App.update(),
     * сбрасывает форму и закрывает окно,
     * в котором находится форма
     * */
    onSubmit (options) {
        Project.update(options, ( e, response ) => {
            if (e === null && response) {
                App.update();
                this.element.reset();
                const modal = App.getModal('editProject');
                modal.close();
            };  
        });
    }
}
  