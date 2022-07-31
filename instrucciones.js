document.getElementById('form').addEventListener('submit', function(e) {
    
    e.preventDefault();

    let form = new FormData(document.getElementById('form'));
    
    fetch('registrar.php', {
        method: 'POST',
        body: form
    })
    .then(res => res.json())
    .then(data => {
        if(data == 'true') {
					document.getElementById ('nombres').value='';
                    document.getElementById ('apellidos').value='';
                    document.getElementById ('fechanac').value='';
                    document.getElementById ('correo').value='';
                    document.getElementById ('clave').value='';  
					alert('El usuario se insertó correctamente.');

        } else {
            console.log(data);
        }
    });
    
});

