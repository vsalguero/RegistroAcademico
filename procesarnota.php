<?php
if(!$_POST){
    header('location: alumnos.view.php');
}
else {
    //incluimos el archivo para hacer la conexion
    require 'functions.php';
    //Recuperamos los valores que vamos a llenar en la BD
    $id_materia = htmlentities($_POST ['id_materia']);
    $id_grado = htmlentities($_POST ['id_grado']);
    $id_seccion = htmlentities($_POST ['id_seccion']);
    $num_eval = htmlentities($_POST ['num_eval']);
    $num_alumnos = htmlentities($_POST['num_alumnos']);

    //insertar es el nombre del boton guardar que esta en el archivo notas.view.php
    if (isset($_POST['insertar'])){

        /*Recorro el numero de estudiantes*/
        for($i = 0; $i < $num_alumnos; $i++){
            $id_alumno = htmlentities($_POST['id_alumno' . $i]);
            //por cada estudiante se recorre el numero de evaluaciones para extraer la nota de cada una
                //funcion existeNota en functions.php valida que la nota no exista segun el alumno y la materia
                if(existeNota($id_alumno,$id_materia,$conn) == 0){
                    for($j = 0; $j < $num_eval; $j++) {
                        $nota = htmlentities($_POST['evaluacion' . $j . 'alumno' . $i]);
                        $observaciones = htmlentities($_POST['observaciones' . $i]);
                        $sql_insert = "insert into notas (id_alumno, id_materia, nota, observaciones) values ('$id_alumno', '$id_materia', '$nota','$observaciones' )";
                        $result = $conn->query($sql_insert);
                    }
                }elseif(existeNota($id_alumno,$id_materia,$conn) > 0){
                    //hace una actualizacion o update
                    for($j = 0; $j < $num_eval; $j++) {
                        $id_nota = htmlentities($_POST['idnota' . $j . 'alumno' . $i]);
                        $nota = htmlentities($_POST['evaluacion' . $j . 'alumno' . $i]);
                        $observaciones = htmlentities($_POST['observaciones' . $i]);
                        $sql_query = "update notas set nota = '$nota', observaciones = '$observaciones' where id = ".$id_nota;
                        $result = $conn->query($sql_query);
                    }
                }

        }
        if (isset($result)) {
            header('location:notas.view.php?grado='.$id_grado.'&materia='.$id_materia.'&seccion='.$id_seccion.'&revisar=1&info=1');
        } else {
            header('location:notas.view.php?grado='.$id_grado.'&materia='.$id_materia.'&seccion='.$id_seccion.'&revisar=1&err=1');
        }// validación de registro*/

    //sino boton modificar que esta en el archivo alumnoedit.view.php
    }else if (isset($_POST['modificar'])) {
        //capturamos el id alumnos a modificar
            $id_alumno = htmlentities($_POST['id']);
            $result = $conn->query("update alumnos set num_lista = '$numlista', nombres = '$nombres', apellidos = '$apellidos', genero = '$genero',id_grado = '$idgrado', id_seccion = '$idseccion' where id = " . $id_alumno);
            if (isset($result)) {
                header('location:alumnoedit.view.php?id=' . $id_alumno . '&info=1');
            } else {
                header('location:alumnoedit.view.php?id=' . $id_alumno . '&err=1');
            }// validación de registro

    }

}

