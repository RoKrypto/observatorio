<?php
    $error_nombre = '';
    $error_correo = '';
    $error_institucion = '';
    $error_tema = '';
    $error_mensaje = '';
    $enviado = '';

    if(isset($_POST['enviar'])){
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $institucion = $_POST['institucion'];
        $tema = $_POST['tema'];
        $mensaje = $_POST['mensaje'];
        
        if(!empty($nombre)){
            $nombre = trim($nombre);
            $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        }else{
            $error_nombre = 'Por favor, introduzca su(s) nombre(s) y apellido(s)';
        }
        
        if(!empty($correo)){
            $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
            
            if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
                $error_correo = 'Por favor, introduzca un correo válido';
            }
            
        }else{
            $error_correo = 'Por favor, introduzca su correo';
        }
        
        if(!empty($institucion)){
            $institucion = trim($institucion);
            $institucion = filter_var($institucion, FILTER_SANITIZE_STRING);
        }else{
            $error_institucion = 'Por favor, introduzca su institución';
        }
        
        if(!empty($tema)){
            $tema = trim($tema);
            $tema = filter_var($tema, FILTER_SANITIZE_STRING);
        }else{
            $error_tema = 'Por favor, introduzca un tema'; 
        }
        
        if(!empty($mensaje)){
            $mensaje = htmlspecialchars($mensaje);
            $mensaje = trim($mensaje);
            $mensaje = stripslashes($mensaje);
        }else{
            $error_mensaje = 'Por favor, introduzca su mensaje';
        }
        
        if(!$error_nombre && !$error_correo && !$error_institucion && !$error_tema && !$error_mensaje){
            $destinatario = 'rmendoza@pol.una.py';
            $mensaje_preparado = 'De: '.$nombre.'\n';
            $mensaje_preparado .= 'Correo: '.$correo.'\n';
            $mensaje_preparado .= 'Institución: '.$institucion.'\n';
            $mensaje_preparado .= 'Tema: '.$tema.'\n';
            $mensaje_preparado .= 'Mensaje: '.$mensaje;
            
            //mail($destinatario, $tema, $mensaje_preparado);
            $enviado = true;
        }
            
    }

    require 'index.php';
?>