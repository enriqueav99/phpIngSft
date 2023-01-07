<?php
session_start();
include './bbdd/obtenerSesiones.php';
$_SESSION['cliente'] =$_POST['cliente'];

obtenerServicios();
$servicios = $_SESSION['servicios'];
if(!empty($servicios)){
    obtenerNombres();
    $tratamientos = $_SESSION['tratamientos'];
    
                $prinFormulario = <<<FORM
                <form action="./nuevaSesion.php" method="post">
                <select name="servicio" REQUIRED>
FORM;
        
        
        $finFormulario = <<<FORM
                <p>
                <p>Fecha: 
                <input type="date" name= "fecha">
                <p>Fecha 
                <input type="time" name= "hora">
                <p>
                <input type ="submit" value="Enviar formulario">
                </select>
                </form>
FORM;
        
        
        
        
        print($prinFormulario);
        foreach($tratamientos as $tratamiento){

            include './bbdd/conexion_bd.php';
            $query="SELECT nombre_trat FROM tratamiento WHERE id_trat ='$tratamiento'";
            $res = mysqli_query($conexion, $query);
            $reg= mysqli_fetch_array($res);
            
            print('<option value="');
            print($tratamiento);
            print('">');
            print("$reg[0]</option>");
        }
        
        print($finFormulario);
        
        
        
        
        
    
}else{
    print("Este usuario no tiene nada contratado");
    
}


