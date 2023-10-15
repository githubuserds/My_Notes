<!-- Create new User in the app -->
<?php

// Include Connection
include 'connection.php';

// SQL for create new user in the app and you respective validation
if (isset($_POST['registerUser'])) {
     $userRegister = $_POST['userRegister'];
     $mailRegister = $_POST['mailRegister'];
     $passwordRegister = $_POST['passwordRegister'];

     $insert = "INSERT INTO list_users (nameUser, mailUser, passwordUser)
                                VALUES ('$userRegister', '$mailRegister', '$passwordRegister')";

     $valid = mysqli_query($conn, "SELECT * FROM list_users WHERE nameUser = '$userRegister' and 
                                                                  mailUser = '$mailRegister'");

     if (mysqli_num_rows($valid) > 0) {
          echo '<script>
                    alert("Estos datos ya existen, intenta con unos diferentes");
                    location = "../modules/registerUser.php";
               </script>';
          exit();
     }

     $result = mysqli_query($conn, $insert);

     if ($result) {
          echo '<script>
                    alert("Usuario Registrado Exitosamente");
                    location = "../index.php";
               </script>';
     } else {
          echo '<script>
                    alert("Error al registrar usuario, inténtalo nuevamente");
                    location = "../modules/registerUser.php";
               </script>';
     }
}
?>