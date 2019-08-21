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
    constructor(element) {
      if (element === undefined) {
        console.error(`An element is not passed to the ProjectsPage constructor!`);
      } else {
        this.element = element;
      };
  
      this.registerEvents();
    }
  
    /**
     * Вызывает метод render для отрисовки страницы
     * */
    update() {
      this.render();
    }
  
    /**
     * Отслеживает нажатие на кнопку удаления проета.
     * Внутри обработчика пользуюсь
     * методом ProjectsPage.removeProject
     * */
    registerEvents() {
      this.element.addEventListener('click', e => {
        if (e.target.classList.contains('btn-delete')) {
          const id = e.target.closest('li').dataset.projectId;
          this.removeProject(id);
        };
        e.preventDefault();
      });
    }
  
    /**
     * Удаляет проект. Необходимо показать диаголовое окно (с помощью confirm())
     * Если пользователь согласен удалить проект, вызываем Project.remove.
     * По успешному удалению необходимо вызвать метод App.update()
     * для обновления приложения
     * */
    removeProject(id) {
      let result = confirm('Вы согласны удалить данный проект?');

      if (result) {
        Project.remove(id, (e, response) => {
          if (e === null && response) {
            console.log('Removed!');
            App.update();
          };
        });
      }
    }
  
    /**
     * Получает список Project.list и полученные данные передаёт
     * в ProjectsPage.renderProjects()
     * */
    render() {
      Page.list({}, (e, response) => {
        if (e === null && response) {
          console.log('Render Projects!');
          this.renderProjects(response);
        };
      });
    }
  
    /**
     * Форматирует дату
     * Исходный формат:
     * Желаемый формат:
     * */
    formatDate(date) {
  
    }
  
    /**
     * Формирует HTML-код проекта.
     * item - объект с информацией о проекте
     * */
    getProjectHTML(item) {
      const items = this.element.querySelectorAll('.list-item');

      for (const i of items) {
        if (i.dataset.projectId === item.id) {
          return '';
        };
      };

      return `<li class="list-item project" data-project-id="${item.id}" data-project-status="${item.status}">
                <p class="list-item_text initial-lang">
                  ${item.text}
                </p>
                <div class="list-item_control">
                    <div class="btns">
                        <button class="btn btn-edit">
                            Edit
                        </button>
                        <button class="btn btn-delete">
                            Delete
                        </button>
                    </div>
                    <div class="list-item_info">
                        <p class="deadline">${item.deadline}</p>
                        <div class="target-lang_holder">
                            <span class="target-lang">
                              ${item["target-lang"].join(' ')}
                            </span>
                        </div>
                    </div>
                </div>
            </li>`;      
    }
  
    /**
     * Отрисовывает список проектов на странице
     * используя getProjectHTML
     * */
    renderProjects(projects) {
      let html = '';
      
      for (const project of JSON.parse(projects)) {
        html += this.getProjectHTML(project);
      };
      
      this.element.insertAdjacentHTML('beforeend', html);
    }
}