//fucntion to show selected section
function showSection(sectionID){
    //initially, select all sections
    // use querySelectorAll for all sections with class content and homecontent
    const sections = document.querySelectorAll('.content');
    const homesection = document.querySelectorAll('.homecontent');

    //hide the resulting content sections using foreach
    sections.forEach(section => {
        section.style.display='none';
    });


    //select the section that would
    //be displayed when clicked
    const activeSection = document.getElementById(sectionID);
    if(activeSection){
        activeSection.style.display='block';
    }
    
    // Show/hide welcome text based on section
    const welcomeText = document.querySelectorAll('.splash');
    if (sectionID === 'home') {
        welcomeText.forEach(text => {
            text.style.display = 'block';
        });
    } else {
        welcomeText.forEach(text => {
            text.style.display = 'none';
        });
    }
}

//for the insertion success
window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    
    if (urlParams.get('status') === 'success') {
        const toast = document.getElementById('success-toast');
        toast.classList.remove('toast-hidden');
        
        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.classList.add('toast-hidden'), 500);
        }, 3000);

        window.history.replaceState({}, document.title, window.location.pathname);
    }
    
    if (urlParams.get('status') === 'updated') {
        const toast = document.getElementById('update-toast');
        toast.classList.remove('toast-hidden');
        
        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.classList.add('toast-hidden'), 500);
        }, 3000);

        window.history.replaceState({}, document.title, window.location.pathname);
    }
    
    if (urlParams.get('status') === 'deleted') {
        const toast = document.getElementById('delete-toast');
        toast.classList.remove('toast-hidden');
        
        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.classList.add('toast-hidden'), 500);
        }, 3000);

        window.history.replaceState({}, document.title, window.location.pathname);
    }
}

// Clear fields function for update form
function clearUpdateFields() {
    document.getElementById('update-id').value = '';
    document.getElementById('update-surname').value = '';
    document.getElementById('update-name').value = '';
    document.getElementById('update-middlename').value = '';
    document.getElementById('update-address').value = '';
    document.getElementById('update-contact').value = '';
}