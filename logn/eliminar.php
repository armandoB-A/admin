<?php
    include('conection.php');
    $consulta="call borrar_producto ('".$_GET['clave']."')";
    echo "$consulta";
    if(mysqli_query($conn,$consulta)){
        echo "Producto eliminado";
        header("location:/admin/index3.php");
    }else{
        echo "Unos pedillos";
        echo "<a href='/admin/index3.php'>Regresar</a>";
    }
?>