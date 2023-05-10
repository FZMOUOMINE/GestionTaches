document.getElementById('my-form').addEventListener('submit', function(event) {
    event.preventDefault();

    let formData = new FormData(event.target);

    axios.post('http://localhost:8000/api/login', formData)
        .then(function(response) {
            console.log(response.data);
            window.location.href = '/projects'; 
        })
        .catch(function(error) {
            console.log(error.response.data);
            
        });
});
