import './bootstrap';

import Alpine from 'alpinejs';

//import Swal from 'sweetalert2';

window.Alpine = Alpine;

Alpine.start();

/* Swal.fire({
            title: "¿Estás seguro de eliminar la vacante?",
            text: "Una vacante eliminada no se puede recuperar",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, ¡Eliminar!",
            cancelButtonText: "Cancelar"
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "¡Eliminada!",
                text: "Tu vacante ha sido eliminada.",
                icon: "success"
            });
            }
        });
 */