<?php



function obtenerClientes(){

$clientes = array();
include './bbdd/conexion_bd.php';
$query = "SELECT nif_cli, nombre FROM cliente";

$res=mysqli_query($conexion, $query);
while($reg = mysqli_fetch_array($res)){
    $linea =array();
    array_push($linea, $reg['nif_cli']);
    array_push($linea, $reg['nombre']);
    array_push($clientes, $linea);
}
$_SESSION['clientes'] = $clientes;



mysqli_close($conexion);

}