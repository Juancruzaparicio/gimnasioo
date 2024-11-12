<?php

class ControladorClientes{

    static public function ctrMostrarClientes($item, $valor){

        $respuesta = ModeloClientes::mdlMostrarClientes($item, $valor);
        return $respuesta;
    } 

    static public function ctrAgregarClientes()
    {

        if (isset($_POST["dni_cliente"])) {
            $tabla = "clientes";

            $datos = array(
                "dni" => $_POST["dni_cliente"],
                "nombre" => $_POST["nombre_cliente"],
                "apellido" => $_POST["apellido_cliente"],
                "telefono" => $_POST["telefono_cliente"],
                "mail" => $_POST["mail_cliente"],
                "fecha_nacimiento" => $_POST["fecha_nacimiento_cliente"],
                "direccion" => $_POST["direccion_cliente"],
                "fecha_inscripcion" => $_POST["fecha_inscripcion_cliente"],
                "id_plan" => $_POST["id_plan_cliente"],
                "estado" => $_POST["estado_cliente"]
                
            );

            //print_r($datos);

            $url = ControladorPlantilla::url() . "clientes";
            echo $url;
            $respuesta = ModeloClientes::mdlAgregarClientes($tabla, $datos);
            if ($respuesta == "ok") {
                echo "<script>alert('Cliente agregado correctamente'); window.location.href='clientes';</script>";
            } else {
                echo "<script>alert('Error al agregar cliente');</script>";
            }

        }
    }

}