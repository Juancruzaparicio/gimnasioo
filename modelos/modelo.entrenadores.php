<?php

require_once 'conexion.php';

class ModeloEntrenadores{

    static public function mdlMostrarEntrenadores($item, $valor){

        if ($item != null){
            try{
                $entrenadores = Conexion::Conectar()->prepare("SELECT * FROM entrenadores WHERE $item = :$item;");
                $entrenadores->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $entrenadores->execute();

                return $entrenadores->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {

            try {
                $entrenadores = Conexion::Conectar()->prepare("SELECT * FROM entrenadores;");
                $entrenadores->execute();

                return $entrenadores->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    static public function mdlAgregarEntrenadores($tabla, $datos)
    {
        try {
            $entrenadores = Conexion::conectar()->prepare("INSERT INTO $tabla (dni, nombre, apellido, telefono, mail, especialidad, fecha_contratacion, estado) VALUES (:dni, :nombre, :apellido, :telefono, :mail, :especialidad, :fecha_contratacion, :estado);");

            $entrenadores->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
            $entrenadores->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $entrenadores->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $entrenadores->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
            $entrenadores->bindParam(":mail", $datos["mail"], PDO::PARAM_STR);
            $entrenadores->bindParam(":especialidad", $datos["especialidad"], PDO::PARAM_INT);
            $entrenadores->bindParam(":fecha_contratacion", $datos["fecha_contratacion"], PDO::PARAM_STR);
            $entrenadores->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);


            if ($entrenadores->execute()) {

                return "ok";
            } else {

                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarEntrenadores($tabla, $datos)
    {
        try {
            $entrenadores = Conexion::conectar()->prepare("UPDATE $tabla SET dni = :dni, nombre = :nombre, apellido = :apellido, telefono = :telefono, mail = :mail, especialidad = :especialidad, fecha_contratacion = :fecha_contratacion, estado = :estado WHERE id_entrenador = :id_entrenador");

            $entrenadores->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
            $entrenadores->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $entrenadores->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $entrenadores->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
            $entrenadores->bindParam(":mail", $datos["mail"], PDO::PARAM_STR);
            $entrenadores->bindParam(":especialidad", $datos["especialidad"], PDO::PARAM_INT);
            $entrenadores->bindParam(":fecha_contratacion", $datos["fecha_contratacion"], PDO::PARAM_STR);
            $entrenadores->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
            $entrenadores->bindParam(":id_entrenador", $datos["id_entrenador"], PDO::PARAM_INT);

            if ($entrenadores->execute()) {
                return "ok";
            } else {

                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEliminarEntrenadores($tabla, $datos)
    {
        try {
            $entrenadores = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_entrenador = :id_entrenador");
            $entrenadores->bindParam(":id_entrenador", $datos, PDO::PARAM_INT);

            if ($entrenadores->execute()) {
                return "ok";
            } else {
                return "error";
            }

        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo '<script>
                fncSweetAlert(
                "error",
                "No se puede eliminar el entrenador porque está relacionado con pagos.",
                );
                </script>';
            }
        }

    }
}