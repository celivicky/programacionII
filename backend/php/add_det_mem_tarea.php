<?php

if(isset($_POST['add_det_mem_tarea']))
{

    $idtarea=$_POST['tarid'];
    $idmen=$_POST['memid'];
    $respueta=$_POST['tareresp'];

        $statement = $connect->prepare("INSERT INTO detalle_tarea (idtarea,idmen,respueta) VALUES('$idtarea', '$idmen','$respueta')");

        

         $statement2 = $connect->prepare("UPDATE tarea SET state='1' WHERE idtarea= $idtarea LIMIT 1;");

           //echo "$item";
                //Execute the statement and insert our values.
        $inserted = $statement->execute(); 
        $inserted2 = $statement2->execute(); 


        if($inserted > 0 && $inserted2 > 0){

    echo '<script type="text/javascript">
swal("¡Registrado!", "Se atendio correctamente", "success").then(function() {
            window.location = "../administrador_miembro/tareas.php";
        });
        </script>';
}
else{
    

 echo '<script type="text/javascript">
swal("Error!", "No se puede atender,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../administrador_miembro/tareas.php";
        });
        </script>';

if (!$inserted) {
    print_r($statement->errorInfo()); 
} else {
    print_r($statement2->errorInfo()); 
}
}
  

    }



