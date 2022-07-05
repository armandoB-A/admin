<?php
    include ("/laragon/www/admin/logn/conection.php");

    try {
        mysqli_query($conn, "CALL TD_update_prod('".$_POST['claveP']."', '".$_POST['nombreP']."', '".$_POST['descP']."', '".$_POST['nomCP']."', ".$_POST['precioA'].", ".$_POST['exist'].", ".$_POST['stockMn'].", ".$_POST['stockMx'].", '".$_POST['imputState']."',  '".$_POST['contN']."', '".$_POST['imputState1']."', '".$_POST['imputState2']."', ".$_POST['desc'].")");         
        $procedimiento=$conn->prepare("CALL TD_insert_prod(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $df=4;
        $procedimiento->bind_param("ssssiiiissssi", $_POST['claveP'], $_POST['nombreP'], $_POST['descP'], $_POST['nomCP'], $_POST['precioA'], $_POST['exist'], $_POST['stockMn'], $_POST['stockMx'], $_POST['imputState'], $_POST['contN'], $_POST['imputState1'], $_POST['imputState2'], $_POST['desc']);
        $procedimiento->execute();
        echo ("\nProducto actualizado con exito");

    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
    
?>