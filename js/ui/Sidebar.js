/**
 * Класс Sidebar отвечает за работу боковой колонки:
 * кнопки скрытия/показа колонки в мобильной версии сайта
 * и за кнопки меню
 * */
class Sidebar {
    
    /**
     * Запускает initToggleButton
     * */
    static init() {
        this.initToggleButton();
    }

    /**
     * Отвечает за скрытие/показа боковой колонки:
     * переключает два класса для body: sidebar-open и sidebar-collapse
     * при нажатии на кнопку .sidebar-toggle
     * */
    static initToggleButton() {
        const sidebarBtn = document.querySelector('.sidebar-toggle');
        const sideBar = document.body.classList;

        sidebarBtn.addEventListener('click', e => {

        sideBar.toggle('sidebar-open');
        sideBar.toggle('sidebar-collapse');

        e.preventDefault();
        });
    }
};