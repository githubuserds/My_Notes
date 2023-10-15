<!-- Create a New Note in Data Base -->
<?php

// Include Connection 
include 'connection.php';

// Initialization the Session
session_start();

// Time Zone Definition
date_default_timezone_set("America/El_Salvador");

// Getting idUser
$nameUser = $_SESSION['nameUser'];
$queryId = mysqli_query($conn, "SELECT * FROM list_users WHERE nameUser = '$nameUser'");
$row = mysqli_fetch_array($queryId);
$idGet = $row['idUser'];


// SQL for create new note in Data Base and you validation respective
if (isset($_POST['newNote'])) {
     $idUser = $idGet;
     $titleNote = $_POST['titleNote'];
     $descriptionNote = $_POST['descriptionNote'];
     $dateNote = date('d-m-Y', strtotime($_POST['dateNote']));
     $createNote = date('d-m-Y');

     $insert = "INSERT INTO list_notes (idUser, titleNote, descriptionNote, dateNote, createNote)
                                VALUES ('$idUser', '$titleNote', '$descriptionNote', '$dateNote', '$createNote')";

     $valid = mysqli_query($conn, "SELECT * FROM list_notes WHERE idUser = '$idUser' and 
                                                                  titleNote = '$titleNote' and 
                                                                  descriptionNote = '$descriptionNote' and 
                                                                  dateNote = '$dateNote'");

     if (mysqli_num_rows($valid) > 0) {
          echo '<script>
                    alert("Ya has registrado esta nota, intenta con una nueva");
                    location = "../modules/dashboard.php";
               </script>';
          exit();
     }    

     $result = mysqli_query($conn, $insert);

     if ($result) {
          echo '<script>
                    alert("Nota Registrada Exitosamente");
                    location = "../modules/dashboard.php";
               </script>';
     }else{
          echo '<script>
                    alert("Error al registrar la nota, inténtalo nuevamente");
                    location = "../modules/dashboard.php";
               </script>'; 
     }

}
?>