<!-- URL restriction -->
<?php

// Include Connection
include '../php/connection.php';

// Initialization of the sessions
session_start();

// restricting url if not exit a session
$nameUser = $_SESSION['nameUser'];
$passwordUser = $_SESSION['passwordUser'];

if (!isset($nameUser, $passwordUser)) {
     header('location: ../index.php');
     session_destroy();
     die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />

     <!-- Windows -->
     <link rel="shortcut icon" href="../img/icon.png" />
     <title>
          <?php include '../includes/titleWindows.php'; ?> Dashboard
     </title>

     <!-- Libraries -->
     <?php include '../includes/headerLinks.php'; ?>

     <!-- Styles.CSS -->
     <link type="text/css" rel="stylesheet" href="../css/style.css" />
</head>

<body class="mb-3">

     <!-- NavBar Page -->
     <div class="navbar navbar-expand-lg bg-light  shadow">
          <div class="container-fluid">
               <a href="https://github.com/githubuserds/My_Notes.git" target="_blank" class="navbar-brand fw-bold text-primary fs-4">
                    <?php include '../includes/titlePage.php'; ?>
                    <i class="fa-solid fa-download"></i>
               </a>
               <a href="#" class="fw-bold fs-4" title="Nueva Nota" data-bs-toggle="modal"
                    data-bs-target="#newNotesModal">
                    <span>
                         <?php echo '@' . $_SESSION['nameUser']; ?> <i class="fa-solid fa-plus"></i>
                    </span>
               </a>
               <a href="../php/signoff.php" class="btn btn-danger fw-bold" onclick="return cerrarSesion();">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar Sesión
               </a>
          </div>
     </div>

     <!-- Container General -->
     <div class="container mt-3">

          <!-- List Notes Where Data Base to HTML -->
          <div class="row">
               <?php

              // Getting Id User
               $queryId = mysqli_query($conn, "SELECT * FROM list_users WHERE nameUser = '$nameUser'");

               $row = mysqli_fetch_array($queryId);

               $idGet = $row['idUser'];

               // data viewer
               $query = "SELECT * FROM list_notes WHERE idUser = '$idGet'";

               $results = mysqli_query($conn, $query);

               while ($row = mysqli_fetch_assoc($results)) { ?>
                    <div class="col-4 mt-3">
                         <div class="card">
                              <div class="card-header">
                                   <div class="row">
                                        <div class="col-10">
                                             <p class="h3 text-primary">
                                                  <?php echo $row['titleNote']; ?>
                                             </p>
                                        </div>
                                        <div class="col-2">
                                             <a href="../php/deleteNote.php?idNote=<?php echo $row['idNote'] ?>"
                                                  class="btn btn-danger" onclick="return confirmDelete();">
                                                  <i class="far fa-trash-alt"></i>
                                             </a>
                                        </div>
                                   </div>
                              </div>
                              <div class="card-body">
                                   <p class="text-justify">
                                        <?php echo $row['descriptionNote']; ?>
                                   </p>
                              </div>
                              <div class="card-footer">
                                   <div class="row mb-1">
                                        <div class="col-6">
                                             <p class="mb-0 text-star">
                                                  <strong>Creada:</strong>
                                             </p>
                                        </div>
                                        <div class="col-6">
                                             <p class="mb-0 text-end">
                                                  <span class="text-end">
                                                       <?php echo $row['createNote']; ?>
                                                  </span>
                                             </p>
                                        </div>
                                   </div>

                                   <div class="mb-1 separator_edge"></div>

                                   <div class="row mb-1">
                                        <div class="col-6">
                                             <p class="mb-0 text-star">
                                                  <strong>Agendada para:</strong>
                                             </p>
                                        </div>
                                        <div class="col-6">
                                             <p class="mb-0 text-end">
                                                  <span class="text-end">
                                                       <?php echo $row['dateNote']; ?>
                                                  </span>
                                             </p>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               <?php } ?>
          </div>

          <!--Modal For: News Notes -->
          <div class="modal fade" id="newNotesModal" tabindex="-1" aria-labelledby="exampleModalLabel"
               aria-hidden="true">
               <div class="modal-dialog">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel">
                                   Nueva Nota
                              </h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                   aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                              <form action="../php/newNotes.php" method="POST">
                                   <div class="mb-3">
                                        <p class="form-label fw-bold">
                                             <i class="fa-solid fa-thumbtack"></i>
                                             Titulo:
                                        </p>
                                        <input type="text" name="titleNote" class="form-control"
                                             placeholder="Escribe aquí" max-length="50" required autofocus />
                                   </div>

                                   <div class="mb-3">
                                        <p class="form-label fw-bold">
                                             <i class="fa-solid fa-list-ul"></i>
                                             Descripción:
                                        </p>

                                        <textarea type="text" name="descriptionNote" class="form-control" cols="1"
                                             rows="3" placeholder="Escribe aquí" max-length="250" required></textarea>
                                   </div>

                                   <div class="mb-0">
                                        <p class="form-label fw-bold">
                                             <i class="fa-solid fa-list-ul"></i>
                                             Agendada para:
                                        </p>

                                        <input type="date" name="dateNote" class="form-control" required>
                                   </div>
                         </div>
                         <div class="modal-footer">
                              <button type="submit" name="newNote" class="btn btn-primary fw-bold w-100">
                                   Agregar Nota
                              </button>
                         </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>

     <!-- Scripts Libraries -->
     <?php include '../includes/footerLinks.php'; ?>

     <!-- Scripts.JS -->
     <script src="../js/alerts.js"></script>

</body>

</html>
