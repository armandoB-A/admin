<?php
    include "conection.php";
    function datosIDs( $query, $nom) {
        global $conn;
        $ejectQuery = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($ejectQuery)) {
            echo " <option value=\"{$row[$nom]}\">{$row[$nom]}</option>";
        }
    }

    function datosTabla($query){
        global $conn;
        $ejectQuery = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($ejectQuery)) {
            echo "
                    <td>".$row[0]."</td>
                    <td>".$row[1]."</td>
                    <td>".$row[2]."</td>
                    <td>".$row[3]."</td>
                    <td>".$row[4]."</td>
                    <td>".$row[5]."</td>
                    <td>".$row[6]."</td>
                    <td>".$row[7]."</td>
                    <td>".$row[8]."</td>
                    <td>".$row[9]."</td>
                    <td>".$row[10]."</td>
                    <td>".$row[11]."</td>
                    <td>".$row[12]."</td>
                    <td> <i class='fas fa-edit'></i> </td>
                    <td><a href='logn/eliminar.php?clave=$row[0]'><i class='fas fa-trash-alt' title='Eliminar'></i></a></td>
                </tr>";
        }
    }
    function llamarPIngAct($proc)
    {
        global $conn;
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
        
    }
?>