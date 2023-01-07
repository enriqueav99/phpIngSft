<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        print("<h1>Selecciona el cliente que quiere reservar: <br> </h1>");
        include'./bbdd/conexion_bd.php';
        include './bbdd/obtenerClientes.php';
        obtenerClientes();
        $clientes = $_SESSION['clientes'];
        $prinFormulario = <<<FORM
                <form action="./tratamientos.php" method="post">
                <select name="cliente" REQUIRED>
FORM;
        
        
        $finFormulario = <<<FORM
                <p>
                <input type ="submit" value="Enviar formulario">
                </select>
                </form>
FORM;
        
        
        
        
        print($prinFormulario);
        foreach($clientes as $cliente){
            print('<option value="');
            print($cliente[0]);
            print('">');
            print("$cliente[1]</option>");
        }
        
        print($finFormulario);
        
        ?>
    </body>
</html>
