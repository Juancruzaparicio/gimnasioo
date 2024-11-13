<?php

class ControladorPagos{

    static public function ctrMostrarPagos($item, $valor){

        $respuesta = ModeloPagos::mdlMostrarPagos($item, $valor);
        return $respuesta;
    } 

    static public function ctrAgregarPagos()
    {

        if (isset($_POST["id_cliente_pago"])) {
            $tabla = "pagos";

            $datos = array(
                "id_cliente" => $_POST["id_cliente_pago"],
                "monto_pagado" => $_POST["monto"],
                "metodo_pago" => $_POST["metodo"],
                "id_plan" => $_POST["id_plan_pago"],
                "estado_pago" => $_POST["estado_pago"],
                "fecha_pago" => $_POST["fecha"]
                
            );

            //print_r($datos);

            $url = ControladorPlantilla::url() . "pagos";
            echo $url;
            $respuesta = ModeloPagos::mdlAgregarPagos($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "El Pago se agregó correctamente",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = "' . $url . '";
                    });
                </script>';
            }

        }
    }

    static public function ctrEditarPagos()
    {
        $tabla = "pagos";

        if (isset($_POST["id_pago"])) {

            $datos = array(
                "id_cliente" => $_POST["cliente"],
                "monto_pagado" => $_POST["monto"],
                "metodo_pago" => $_POST["metodo"],
                "id_plan" => $_POST["plan"],
                "estado_pago" => $_POST["estado"],
                "fecha_pago" => $_POST["fecha"],
                "id_pago" => $_POST["id_pago"]

            );
            print_r($datos);

            $url = ControladorPlantilla::url() . "pagos";

            $respuesta = ModeloPagos::mdlEditarPagos($tabla, $datos);
            print_r($respuesta);
            if ($respuesta == "ok") {
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "El Pago se actualizó correctamente",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = "' . $url . '";
                });
            </script>';
            }
        }
    }

    static public function ctrEliminarPagos()
    {
        if (isset($_GET["id_pago"])) {

            $url = ControladorPlantilla::url() . "pagos";
            $tabla = "pagos";
            $datos = $_GET["id_pago"];

            $respuesta = ModeloPagos::mdlEliminarPagos($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "El Pago se eliminó correctamente",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = "' . $url . '";
                    });
                </script>';
            }
        }
    }

}