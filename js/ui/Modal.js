/**
 * Класс Modal отвечает за
 * управление всплывающими окнами.
 * В первую очередь это открытие или
 * закрытие имеющихся окон
 * */
class Modal {
    /**
     * Устанавливает текущий элемент в свойство element
     * Регистрирует обработчики событий с помощью
     * Modal.registerEvents()
     * Если переданный элемент не существует,
     * необходимо выкинуть ошибку.
     * */
    constructor(element) {
      if (element === undefined) {
        console.error(`An element is not passed to the Modal constructor!`);
      } else {
        this.element = element;
      };
  
      this.closeBtns = this.element.querySelectorAll('.close-btn');
  
      this.onClose = this.onClose.bind(this);
      this.close = this.close.bind(this);
  
      this.registerEvents();
    }
  
    /**
     * При нажатии на элемент с .close-btn
     * должен закрыть текущее окно
     * (с помощью метода Modal.onClose)
     * */
    registerEvents() {
      for (const clsBtn of this.closeBtns) {
        clsBtn.addEventListener('click', this.onClose);
      };
    }
  
    /**
     * Срабатывает после нажатия на элементы, закрывающие окно.
     * Закрывает текущее окно (Modal.close())
     * */
    onClose(e) {
      this.close();
      e.preventDefault();
    }
    /**
     * Удаляет обработчики событий
     * */
    unregisterEvents() {
      for (const clsBtn of this.closeBtns) {
        clsBtn.removeEventListener('click', this.onClose);
      };
    }
    /**
     * Открывает окно: устанавливает CSS-свойство display
     * со значением «block»
     * */
    open() {
      this.element.classList.add('active');
    }
    /**
     * Закрывает окно: удаляет CSS-свойство display
     * */
    close() {
      this.element.classList.remove('active');
    }
  }