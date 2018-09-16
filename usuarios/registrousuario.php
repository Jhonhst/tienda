<!-- registro de usuario -->
<?php

include_once '../conexion.php';

if($_POST){
    $usuario= $_POST['usuario'];
    $correo= $_POST['correo'];
    $contrasenia= $_POST['contrasenia'];
    $contraseniados= $_POST['contraseniados'];
  
    $sql_agregar='INSERT INTO usuarios (usuario,correo,contrasenia,cotraseniados) VALUES (?,?,?,?)';
    $sentencia_agregar =$pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array($usuario,$correo,$contrasenia,$contraseniados));

    echo "registrado";

//     $verificar_correo= ("SELECT * FROM usuarios WHERE usuario='$usuario'");
//     $sentencia_verificar =$pdo->prepare($verificar_correo);
//     $sentencia_verificar->execute(array());
//     if($sentencia_verificar->fetchColumn()>0){
//     echo  "<script>
//     alert('El usuario ya esta registrado');
//     window.history.go(-1);
//     </script>";
//     echo "usuario registrado";
//     exit;
//    }
     header('location:../ingresar.php');
}
?>