/**
 * Sidebar class is responsible 
 * for the sidebar of the page:
 * The open/close btns in a mobile
 * version of the page and the menu btns.
 * */
class Sidebar {
    
    /**
     * Inits initToggleButton
     * Inits initMenuBtns
     * */
    static init() {
        this.initToggleButton();
        this.initMenuBtns();
    }

    /**
     * Close and open the sidebar
     * Toggles sidebar-open when .sidebar-toggle
     * is pressed
     * */
    static initToggleButton() {
        const sidebarBtn = document.querySelector('.sidebar-toggle');
        const sideBar = document.body.classList;

        sidebarBtn.addEventListener('click', e => {

            sideBar.toggle('sidebar-open');

            e.preventDefault();
        });
    }

    /**
     * Registers events for buttons
     * When a certain btn is pressed
     * the projects on the page will be
     * sorted according to the btn name
     * */
    static initMenuBtns() {
        const btns = document.querySelectorAll('.menu-btn');

        btns.forEach( btn => {
            
            if (btn.classList.contains('new')) {
                
                btn.addEventListener('click', e => {
                    const projects = document.querySelectorAll('.project');
                    projects.forEach( project => {
                        if (project.dataset.projectStatus !== 'new') {
                            project.style.display = 'none';
                        } else {
                            project.style.display = 'flex';
                        }
                    });
                    e.preventDefault();
                });
            } else if (btn.classList.contains('resolved')) {
                
                btn.addEventListener('click', e => {
                    const projects = document.querySelectorAll('.project');
                    projects.forEach( project => {
                        if (project.dataset.projectStatus !== 'resolved') {
                            project.style.display = 'none';
                        } else {
                            project.style.display = 'flex';
                        }
                    });
                    e.preventDefault();
                });
            } else if (btn.classList.contains('done')) {
                
                btn.addEventListener('click', e => {
                    const projects = document.querySelectorAll('.project');
                    projects.forEach( project => {
                        if (project.dataset.projectStatus !== 'done') {
                            project.style.display = 'none';
                        } else {
                            project.style.display = 'flex';
                        }
                    });
                    e.preventDefault();
                });
            } else if (btn.classList.contains('rejected')) {
                
                btn.addEventListener('click', e => {
                    const projects = document.querySelectorAll('.project');
                    projects.forEach( project => {
                        if (project.dataset.projectStatus !== 'rejected') {
                            project.style.display = 'none';
                        } else {
                            project.style.display = 'flex';
                        }
                    });
                    e.preventDefault();
                });
            } else if (btn.classList.contains('all')) {
                btn.addEventListener('click', e => {
                    const projects = document.querySelectorAll('.project');
                    projects.forEach( project => {
                        project.style.display = 'flex';
                    });
                    e.preventDefault();
                });
            };
        });
    }
};