<?php

function obtenerServicios(){
    include './bbdd/conexion_bd.php';
    $servicios = array();

    $nif = $_SESSION['cliente'];
    //$query = "SELECT serv.id_serv, serv.num_sesiones FROM sesion AS ses, servicio AS serv WHERE serv.nif_cli LIKE '$nif' AND serv.id_serv = ses.id_serv";
    $query="SELECT id_serv, num_sesiones FROM servicio WHERE nif_cli = '$nif'";

    $res = mysqli_query($conexion, $query)or die(mysqli_error($conexion));
    while($reg= mysqli_fetch_array($res)){
        $idServ = $reg[0];
        $query2 ="SELECT * FROM sesion WHERE id_serv = $idServ";
        $res2 = mysqli_query($conexion, $query2);
        if(mysqli_num_rows($res2) <$reg[1] ){
        array_push($servicios, $idServ);
        }
}
$_SESSION['servicios'] = $servicios;
mysqli_close($conexion);
}

function obtenerNombres(){
$servicios= $_SESSION['servicios'];
$tratamientos = array();


foreach ($servicios as $servicio){
    include './bbdd/conexion_bd.php';
    $query = "SELECT * FROM servicio WHERE id_serv LIKE '$servicio' ";

    $resultado  = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
    while($reg = mysqli_fetch_array($resultado)){
        $tratamiento = $reg['id_trat'];
        array_push($tratamientos, $tratamiento);
        mysqli_close($conexion);
}
$_SESSION['tratamientos']=$tratamientos;

}
}