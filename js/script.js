
function confirmDelete(producto_id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: `No podrás revertir esta acción. ${producto_id}`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `eliminar.php?producto_id=${producto_id}`;
        }
    });
}


function solicitarLogin(){
    Swal.fire({
        title: 'Atencion',
        text: `Inicia sesion antes de agregar productos`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Iniciar sesion'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `../login/login.php`;
        }
    });
}