var logoutBtn = document.getElementById('logout');
if (logoutBtn) {
    logoutBtn.addEventListener('click', (event) => {
        event.preventDefault();
        fetch('admin/includes/ajax.php', {
            method: 'POST',
            headers: {'Content-Type':'application/x-www-form-urlencoded'},
            body: 'action=logout',
        }).then(response => response).then(response => {
            location.reload();
        }).catch(error => {
            console.log(error);
        })
    })
}