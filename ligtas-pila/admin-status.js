document.addEventListener('change', function(e){
    if(e.target.classList.contains('status-select')){
        const id = e.target.getAttribute('data-id');
        const status = e.target.value;

        //change color base on status
        if (status=== 'Pending'){
            e.target.style.color = 'orange';
        } else if(status === 'Processing'){
            e.target.style.color = 'blue';
        } else if(status === 'Completed'){
            e.target.style.color = 'green';
        }

        //connecting to database and the row of status
        fetch('status.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'id=' + id + '&status=' + status
        })
        .then(response => response.json())
        .then(data => {
            if(data.success){
                console.log('Status update to ' + status);
            }
        })
        .catch(error =>{
            console.error('Error:', error);
        });
    }
});