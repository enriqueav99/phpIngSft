<?php

$id = $_POST['servicio'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

include './bbdd/conexion_bd.php';

$fechaR = explode("-", $fecha);
$fechah = explode("-",date("Y-m-d"));
if($fechah[0] <= $fechaR[0]){
    if($fechah[1] <= $fechaR[1]){
        if($fechah[2] <= $fechaR[2]){
            $query ="INSERT INTO sesion (id_serv, fecha, hora) VALUES('$id', '$fecha', '$hora')";
                $res= mysqli_query($conexion, $query) or die(mysqli_error($conexion));
                if($res){
                    print("reservado con exito");
                }else{
                    print("error de insercion");
                }
        }else{print("Error, fecha y/o hora no validas");}
    }else{print("Error, fecha y/o hora no validas");}
}else{print("Error, fecha y/o hora no validas");}



