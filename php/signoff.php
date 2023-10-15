<!-- Closed of all open sessions. -->
<?php
     // Call of Session
     session_start();

     // Closed of Session
     session_destroy();

     // Redirection after of session_destroy
     header('location: ../index.php')
?>