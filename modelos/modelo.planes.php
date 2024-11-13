<?php

require_once 'conexion.php';

class ModeloPlanes{

    static public function mdlMostrarPlanes($item, $valor){

        if ($item != null){
            try{
                $planes = Conexion::Conectar()->prepare("SELECT * FROM plan_entrenamiento WHERE $item = :$item;");
                $planes->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $planes->execute();

                return $planes->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {

            try {
                $planes = Conexion::Conectar()->prepare("SELECT * FROM plan_entrenamiento;");
                $planes->execute();

                return $planes->fetchAll(PDO::FETCH_ASSOC);
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

    static public function mdlEditarPlanes($tabla, $datos)
    {
        try {
            $planes = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, codigo = :codigo, descripcion = :descripcion, duracion_semanas = :duracion_semanas, cantidadsesiones_semana = :cantidadsesiones_semana, id_entrenador = :id_entrenador WHERE id_plan = :id_plan");

            $planes->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $planes->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
            $planes->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
            $planes->bindParam(":duracion_semanas", $datos["duracion_semanas"], PDO::PARAM_INT);
            $planes->bindParam(":cantidadsesiones_semana", $datos["cantidadsesiones_semana"], PDO::PARAM_INT);
            $planes->bindParam(":id_entrenador", $datos["id_entrenador"], PDO::PARAM_INT);
            $planes->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);

            if ($planes->execute()) {
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