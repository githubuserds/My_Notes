<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />

     <!-- Windows -->
     <link rel="shortcut icon" href="../img/icon.png" />
     <title>
          <?php include '../includes/titleWindows.php'; ?> New User
     </title>

     <!-- Libraries -->
     <?php include '../includes/headerLinks.php'; ?>

     <!-- Styles.CSS -->
     <link type="text/css" rel="stylesheet" href="../css/style.css" />
</head>

<body>

     <!-- Container General  -->
     <div class="d-flex vh-100 justify-content-center align-items-center">
          <div class="container bg-white rounded shadow p-2 w-50">
               <!-- Form For: New User -->
               <form action="../php/newUser.php" method="POST" class="form-control p-2">
                    <div class="mb-4 border border-2 border-0 border-bottom border-primary">
                         <p class="h1 text-center">Nuevo Usuario</p>
                    </div>

                    <div class="mb-3">
                         <p class="form-label fw-bold">
                              <i class="fa-solid fa-user"></i>
                              Nombre de Usuario:
                         </p>
                         <input type="text" name="userRegister" class="form-control" placeholder="Escribe aquí" required
                              autofocus />
                    </div>

                    <div class="mb-3">
                         <p class="form-label fw-bold">
                              <i class="fa-solid fa-envelope"></i>
                              Correo Electrónico:
                         </p>
                         <input type="email" name="mailRegister" class="form-control" placeholder="Escribe aquí"
                              required />
                    </div>

                    <div class="mb-4">
                         <p class="form-label fw-bold">
                              <i class="fa-solid fa-lock"></i>
                              Contraseña:
                         </p>
                         <input type="password" name="passwordRegister" class="form-control" placeholder="Escribe aquí"
                              required />
                    </div>

                    <div class="mb-0">
                         <input type="submit" name="registerUser" value="Registrarme"
                              class="btn btn-primary fw-bold w-100">
                    </div>
               </form>
          </div>
     </div>

     <!-- Scripts Libraries -->
     <?php include '../includes/footerLinks.php'; ?>
</body>

</html>