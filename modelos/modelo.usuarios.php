<?php

require_once 'conexion.php';

class ModeloUsuarios{

    static public function mdlMostrarUsuarios($item, $valor){

        if ($item != null){
            try{
                $usuarios = Conexion::Conectar()->prepare("SELECT * FROM usuarios WHERE $item = :$item;");
                $usuarios->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $usuarios->execute();

                return $usuarios->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {

            try {
                $usuarios = Conexion::Conectar()->prepare("SELECT * FROM usuarios;");
                $usuarios->execute();

                return $usuarios->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    static public function mdlAgregarPlanes($tabla, $datos)
    {
        try {
            $planes = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, codigo, descripcion, duracion_semanas, cantidadsesiones_semana, id_entrenador) VALUES (:nombre, :codigo, :descripcion, :duracion_semanas, :cantidadsesiones_semana, :id_entrenador);");

            $planes->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $planes->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
            $planes->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
            $planes->bindParam(":duracion_semanas", $datos["duracion_semanas"], PDO::PARAM_INT);
            $planes->bindParam(":cantidadsesiones_semana", $datos["cantidadsesiones_semana"], PDO::PARAM_INT);
            $planes->bindParam(":id_entrenador", $datos["id_entrenador"], PDO::PARAM_INT);

            if ($planes->execute()) {

                return "ok";
            } else {

                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarUsuarios($tabla, $datos)
    {
        try {
            $usuarios = Conexion::conectar()->prepare("UPDATE $tabla SET username = :username, contra = :contra, nombre = :nombre, apellido = :apellido WHERE id_usuario = :id_usuario");

            $usuarios->bindParam(":username", $datos["username"], PDO::PARAM_STR);
            $usuarios->bindParam(":contra", $datos["contra"], PDO::PARAM_STR);
            $usuarios->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $usuarios->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $usuarios->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);

            if ($usuarios->execute()) {
                return "ok";
            } else {

                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEliminarPlanes($tabla, $datos)
    {
        try {
            $planes = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_plan = :id_plan");
            $planes->bindParam(":id_plan", $datos, PDO::PARAM_INT);

            if ($planes->execute()) {
                return "ok";
            } else {
                return "error";
            }

        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo '<script>
                fncSweetAlert(
                "error",
                "No se puede eliminar el plan porque está relacionado con pagos.",
                );
                </script>';
            }
        }

    }
}