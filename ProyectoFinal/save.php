<?php

include("db.php");

if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
   $query = "INSERT INTO tarea(titulo, descripcion) VALUES ('$title', '$description')";
   $result = mysqli_query($conn, $query);
   if (!$result) {
    die("fallo");
   }
   $_SESSION['message'] = 'Tarea guardada exitosamente';
   $_SESSION['message_type'] = 'success';

   header("Location: index.php");
}
?>