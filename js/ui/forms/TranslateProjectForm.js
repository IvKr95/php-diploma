/**
 * Класс TranslateProjectForm управляет формой
 * перевода текста
 * Наследуется от AsyncForm
 * */
class TranslateProjectForm extends AsyncForm {
    /**
     * Calls the parent's constructor
     * */
    constructor (element) {
      super(element);
    }
  
    update (id, data) {
      this.updateFields(id, data);
      this.updateHtml(data['target-lang']);
      if (data['target-lang-text']) this.updateText(data['target-lang-text']);
    }

    updateFields (id, data) {
      this.element.querySelector('.initial-lang_text').textContent = data.text;
      this.element.querySelector('.initial-lang').textContent = data['initial-lang'];
      this.element.querySelector('.target-lang').textContent = data['target-lang'].join(' ');
      this.element.querySelector('.deadline').textContent = data.deadline;
      this.element.querySelector('.projectId').value = id;
    }

    updateHtml (targetLangs) {
      let html = '';
      targetLangs.forEach( targetLang => {
        html += 
                `<div class="form-group">
                  <span class="bold">${targetLang}</span>
                  <textarea id="${targetLang.toLowerCase()}" name="target-lang-text[${targetLang.toLowerCase()}]" class="form-control target-lang_text"></textarea>
                </div>`;
      });
      this.element.querySelector('.target-lang_holder').innerHTML = html;
    }

    updateText (targetLangs) {
      for (const targetLang in targetLangs) {
        document.getElementById(targetLang).textContent = targetLangs[targetLang];
      };
    }
    /**
     * Upon success resets a form
     * and closes the window with a form
     * */
    onSubmit (options) {
      Project.update(options, ( e, response ) => {
        if (e === null && response) {
          App.update();
          this.element.reset();
          const modal = App.getModal('translateProject');
          modal.close();
        };  
      });
    }
}