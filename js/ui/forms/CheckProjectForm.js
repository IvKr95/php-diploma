/**
 * Класс CheckProjectForm управляет формой
 * проверки перевода
 * Наследуется от AsyncForm
 * */
class CheckProjectForm extends AsyncForm {
    /**
     * Вызывает родительский конструктор
     * */
    constructor (element) {
      super(element);
    }
  
    update (id, data) {
      console.log('check');
      this.updateFields(id, data);
      this.updateHtml(data['target-lang'], data['target-lang-text']);
    }

    updateFields (id, data) {
      this.element.querySelector('.initial-lang_text').textContent = data.text;
      this.element.querySelector('.initial-lang').textContent = data['initial-lang'];
      this.element.querySelector('.target-lang').textContent = data['target-lang'].join(' ');
      this.element.querySelector('.deadline').textContent = data.deadline;
      this.element.querySelector('.projectId').value = id;
    }

    updateHtml (targetLangs, targetLangTxts) {
      let html = '';
      targetLangs.forEach( targetLang => {
        html += 
                `<div class="form-group">
                  <span class="bold">${targetLang}</span>
                  <textarea id="${targetLang.toLowerCase()}" class="form-control target-lang_text" cols="80" rows="5" readonly>${targetLangTxts[targetLang.toLowerCase()]}</textarea>
                </div>`;
      });
      this.element.querySelector('.target-lang_holder').innerHTML = html;
    }
    /**
     * . 
     * По успешному результату вызывает App.update(),
     * сбрасывает форму и закрывает окно,
     * в котором находится форма
     * */
    onSubmit (options) {
      Project.update(options, ( e, response ) => {
        if (e === null && response) {
          App.update();
          this.element.reset();
          const modal = App.getModal('checkProject');
          modal.close();
        };  
      });
    }
}