<!-- Delete Notes Where Data Base -->
<?php

// Include Connection
include 'connection.php';


// SQL for Delete
if (isset($_GET['idNote'])) {
     $idGetNote = $_GET['idNote'];

     $query = "DELETE FROM list_notes WHERE idNote = $idGetNote";

     $result = mysqli_query($conn, $query);

     if ($result) {
          echo '<script>
                    alert("Nota Eliminada Exitosamente");
                    location = "../modules/dashboard.php";
               </script>';
          exit();
     } else {
          echo '<script>
                    alert("Error al eliminar nota, inténtalo nuevamente ");
                    location = "../modules/dashboard.php";
               </script>';
          exit();
     }


}

?>