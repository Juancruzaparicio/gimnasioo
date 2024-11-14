<?php

require_once 'conexion.php';

class ModeloUsuarios{

    static public function mdlMostrarUsuarios($item, $valor){

        if ($item != null){
            try{
                $usuarios = Conexion::Conectar()->prepare("SELECT * FROM usuarios WHERE $item = :$item;");
                $usuarios->bindParam(":" . $item, $valor, PDO::PARAM_STR);
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

    static public function mdlAgregarUsuarios($tabla, $datos)
    {
        try {
            $usuarios = Conexion::conectar()->prepare("INSERT INTO $tabla (username, contra, nombre, apellido) VALUES (:username, :contra, :nombre, :apellido);");

            $usuarios->bindParam(":username", $datos["username"], PDO::PARAM_STR);
            $usuarios->bindParam(":contra", $datos["contra"], PDO::PARAM_STR);
            $usuarios->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $usuarios->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);

            if ($usuarios->execute()) {

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

    static public function mdlEliminarUsuarios($tabla, $datos)
    {
        try {
            $usuarios = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :id_usuario");
            $usuarios->bindParam(":id_usuario", $datos, PDO::PARAM_INT);

            if ($usuarios->execute()) {
                return "ok";
            } else {
                return "error";
            }

        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }

    }
}