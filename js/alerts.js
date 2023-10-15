// Cerrar Sesión
function cerrarSesion() {
     
     var message = confirm("Estas seguro de realizar esta acción, si lo haces tendrás que Iniciar Sesión la proxima vez que desees entrar");

     if (message == true) {
          return true;
     } else {
          return false;
     }
};

// Confirmar delete
function confirmDelete() {
     
     var message = confirm("Estas seguro de ELIMINAR esta nota");

     if (message == true) {
          return true;
     } else {
          return false;
     }
};