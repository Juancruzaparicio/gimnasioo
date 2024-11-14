<?php

require_once 'conexion.php';

class ModeloPagos{

    static public function mdlMostrarPagos($item, $valor){

        if ($item != null){
            try{
                $pagos = Conexion::Conectar()->prepare("SELECT * FROM pagos WHERE $item = :$item;");
                $pagos->bindParam(":" . $item, $valor, PDO::PARAM_INT);
                $pagos->execute();

                return $pagos->fetch(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        } else {

            try {
                $pagos = Conexion::Conectar()->prepare("SELECT p.id_pago, c.nombre, c.apellido, p.monto_pagado, p.metodo_pago, p2.nombre AS nombre_plan, p.estado_pago, fecha_pago FROM pagos AS p INNER JOIN clientes AS c ON c.id_cliente = p.id_cliente INNER JOIN plan_entrenamiento AS p2 ON p2.id_plan = p.id_plan;");
                $pagos->execute();

                return $pagos->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                return "Error: " . $e->getMessage();
            }
        }
    }

    static public function mdlAgregarPagos($tabla, $datos)
    {
        try {
            $pagos= Conexion::conectar()->prepare("INSERT INTO $tabla (id_cliente, monto_pagado, metodo_pago, id_plan, estado_pago, fecha_pago) VALUES (:id_cliente, :monto_pagado, :metodo_pago, :id_plan, :estado_pago, :fecha_pago);");

            $pagos->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
            $pagos->bindParam(":monto_pagado", $datos["monto_pagado"], PDO::PARAM_INT);
            $pagos->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
            $pagos->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
            $pagos->bindParam(":estado_pago", $datos["estado_pago"], PDO::PARAM_STR);
            $pagos->bindParam(":fecha_pago", $datos["fecha_pago"], PDO::PARAM_STR);


            if ($pagos->execute()) {

                return "ok";
            } else {

                return "error";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEditarPagos($tabla, $datos)
    {
        try {
            $pagos = Conexion::conectar()->prepare("UPDATE $tabla SET id_cliente = :id_cliente, monto_pagado = :monto_pagado, metodo_pago = :metodo_pago, id_plan = :id_plan, estado_pago = :estado_pago, fecha_pago = :fecha_pago WHERE id_pago = :id_pago");

            $pagos->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
            $pagos->bindParam(":monto_pagado", $datos["monto_pagado"], PDO::PARAM_INT);
            $pagos->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
            $pagos->bindParam(":id_plan", $datos["id_plan"], PDO::PARAM_INT);
            $pagos->bindParam(":estado_pago", $datos["estado_pago"], PDO::PARAM_STR);
            $pagos->bindParam(":fecha_pago", $datos["fecha_pago"], PDO::PARAM_STR);
            $pagos->bindParam(":id_pago", $datos["id_pago"], PDO::PARAM_INT);

            if ($pagos->execute()) {
                return "ok";
            } else {

                return print_r(Conexion::conectar()->errorInfo());
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    static public function mdlEliminarPagos($tabla, $datos)
    {
        try {
            $pagos = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_pago = :id_pago");
            $pagos->bindParam(":id_pago", $datos, PDO::PARAM_INT);

            if ($pagos->execute()) {
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