<?php

require_once 'conexion.php';

class ModeloClientes{

    static public function mdlMostrarClientes($item, $valor){

        if ($item != null){
            try{
                $clientes = Conexion::Conectar()->prepare("SELECT * FROM clientes WHERE $item = :$item;");
                $clientes->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $clientes->execute();

                return $clientes->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {

            try {
                $clientes = Conexion::Conectar()->prepare("SELECT * FROM clientes;");
                $clientes->execute();

                return $clientes->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    static public function mdlAgregarClientes($tabla, $datos)
    {
        try {
            $clientes = Conexion::conectar()->prepare("INSERT INTO $tabla (dni, nombre, apellido, telefono, mail, fecha_nacimiento, direccion, fecha_inscripcion, id_plan, estado) VALUES (:dni, :nombre, :apellido, :telefono, :mail, :fecha_nacimiento, :direccion, :fecha_inscripcion, :id_plan, :estado);");

            $clientes->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
            $clientes->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $clientes->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $clientes->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
            $clientes->bindParam(":mail", $datos["mail"], PDO::PARAM_STR);
            $clientes->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
            $clientes->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
            $clientes->bindParam(":fecha_inscripcion", $datos["fecha_inscripcion"], PDO::PARAM_STR);
            $clientes->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
            $clientes->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);


            if ($clientes->execute()) {

                return "ok";
            } else {

                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarClientes($tabla, $datos)
    {
        try {
            $clientes = Conexion::conectar()->prepare("UPDATE $tabla SET dni = :dni, nombre = :nombre, apellido = :apellido, telefono = :telefono, mail = :mail, fecha_nacimiento = :fecha_nacimiento, direccion = :direccion, fecha_inscripcion = :fecha_inscripcion, fecha_nacimiento = :fecha_nacimiento, id_plan = :id_plan, estado = :estado WHERE id_cliente = :id_cliente");

            $clientes->bindParam(":dni", $datos["dni"], PDO::PARAM_INT);
            $clientes->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $clientes->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $clientes->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
            $clientes->bindParam(":mail", $datos["mail"], PDO::PARAM_STR);
            $clientes->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
            $clientes->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
            $clientes->bindParam(":fecha_inscripcion", $datos["fecha_inscripcion"], PDO::PARAM_STR);
            $clientes->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
            $clientes->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
            $clientes->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);

            if ($clientes->execute()) {
                return "ok";
            } else {

                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEliminarClientes($tabla, $datos)
    {
        try {
            $clientes = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_cliente = :id_cliente");
            $clientes->bindParam(":id_cliente", $datos, PDO::PARAM_INT);

            if ($clientes->execute()) {
                return "ok";
            } else {
                return "error";
            }

        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo '<script>
                fncSweetAlert(
                "error",
                "No se puede eliminar el cliente porque está relacionado con pagos.",
                );
                </script>';
            }
        }

    }
}