<?php
    include "conection.php";

    try {
        echo "CALL TD_insert_prod('".$_POST['claveP']."', '".$_POST['nombreP']."', '".$_POST['descP']."', '".$_POST['nomCP']."', ".$_POST['precioA'].", ".$_POST['exist'].", ".$_POST['stockMn'].", ".$_POST['stockMx'].", '".$_POST['imputState']."',  '".$_POST['contN']."', '".$_POST['imputState1']."', '".$_POST['imputState2']."', '".$_POST['desc']."')";
        $procedimiento=$conn->prepare("CALL TD_insert_prod(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $df='.5';
        $procedimiento->bind_param("ssssiiiisssss", $_POST['claveP'], $_POST['nombreP'], $_POST['descP'], $_POST['nomCP'], $_POST['precioA'], $_POST['exist'], $_POST['stockMn'], $_POST['stockMx'], $_POST['imputState'], $_POST['contN'], $_POST['imputState1'], $_POST['imputState2'], $df);
        $procedimiento->execute();
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
    
?>