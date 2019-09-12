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