<!-- Process Log In whit Data Base -->
<?php

// Include Connection
include 'connection.php';

// SQL for Validation the Log In
if (isset($_POST['login'])) {
     $userLogin = $_POST['userLogin'];
     $passwordLogin = $_POST['passwordLogin'];

     $validation = mysqli_query($conn, "SELECT * FROM list_users WHERE nameUser = '$userLogin' and
                                                                       passwordUser = '$passwordLogin'");

     if (mysqli_num_rows($validation) > 0) {
          // Sessions
          session_start();

          $_SESSION['nameUser'] = $userLogin;
          $_SESSION['passwordUser'] = $passwordLogin;

          // Redirection
          header("location: ../modules/dashboard.php");
          exit();
     } else {
          echo '<script>
                    alert("Datos no encontrados, verifícalos o crea una cuenta");
                    location = "../index.php";
               </script>';
          exit();
     }
}
?>