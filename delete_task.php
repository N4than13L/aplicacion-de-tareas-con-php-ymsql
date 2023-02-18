<?php
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM task WHERE id = $id";
        $result = mysqli_query($conn,$query);

        if(!$result){
            die("consulta fallida");
        }

        $_SESSION["message"] = "tarea eliminada con exito";
        header("Location: index.php");
    }

?>