<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require 'conn/connection.php';

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $users = $conn->prepare("select username, password, rol from users where username = '".$username."' and password = '".$password."'");
    $users->execute();
    if($users->rowCount() > 0){
        $user = $users->fetch();
        if($user['username'] == $username && $user['password'] == $password){
            //existe el usuario y esa contrase;a
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["rol"] = $user['rol'];
            setcookie("activo", 1, time() + 3600);
            header("Location: inicio.view.php", true, 301);
        } else {
            http_response_code(401);
            //echo "Credenciales incorrectas";
            header('location:index.php?err=1');
        }
    }else {
        http_response_code(401);
        header('location:index.php?err=1');
    }
} else {
    http_response_code(405);
    echo "SOLO SE PUEDE POST";

    // POST_GET
}



