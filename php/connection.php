<!-- Connections to Data Bases-->
<?php

// Connection Variable Local
$conn = new mysqli(
     'localhost',
     'root',
     '',
     'my_notes'
);

// Connection Variable Online(Clever Cloud)
// $conn = new mysqli(
//      'b65dgbywcxs2m5ynbuq8-mysql.services.clever-cloud.com',
//      'usx9nhcjux4fferb',
//      'BOhxG2UqUDxYmOmhJTOA',
//      'b65dgbywcxs2m5ynbuq8'
// );

//Valid Connection     
// if ($conn = false) {
//      echo 'Fail Connection';
// }else{
//      echo 'Successfully Connection';
// }
?>