<?php

require_once 'conexion.php';

class ModeloEspecialidades{

    static public function mdlMostrarEspecialidades($item, $valor){

        if ($item != null){
            try{
                $especialidades = Conexion::Conectar()->prepare("SELECT * FROM especialidades WHERE $item = :$item;");
                $especialidades->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $especialidades->execute();

                return $especialidades->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {

            try {
                $especialidades = Conexion::Conectar()->prepare("SELECT * FROM especialidades;");
                $especialidades->execute();

                return $especialidades->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    static public function mdlAgregarEspecialidades($tabla, $datos)
    {
        try {
            $especialidades = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre);");

            $especialidades->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);

            if ($especialidades->execute()) {

                return "ok";
            } else {

                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarEspecialidades($tabla, $datos)
    {
        try {
            $especialidades = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id_especialidad = :id_especialidad");

            $especialidades->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $especialidades->bindParam(":id_especialidad", $datos["id_especialidad"], PDO::PARAM_INT);

            if ($especialidades->execute()) {
                return "ok";
            } else {

                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEliminarEspecialidades($tabla, $datos)
    {
        try {
            $especialidades = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_especialidad = :id_especialidad");
            $especialidades->bindParam(":id_especialidad", $datos, PDO::PARAM_INT);

            if ($especialidades->execute()) {
                return "ok";
            } else {
                return "error";
            }

        } catch (Exception $e) {
            if ($e->getCode() == 23000) {
                return "Error: " . $e->getMessage();
            }
        }

    }
}