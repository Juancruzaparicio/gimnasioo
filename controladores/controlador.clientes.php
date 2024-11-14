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
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "El cliente se agregó correctamente",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = "' . $url . '";
                    });
                </script>';
            } else {
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Hubo un error al agregar el cliente",
                        text: "Por favor, inténtalo de nuevo",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
            }

        }
    }

    static public function ctrEditarClientes()
    {
        $tabla = "clientes";

        if (isset($_POST["id_cliente"])) {

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
                "estado" => $_POST["estado_cliente"],
                "id_cliente" => $_POST["id_cliente"]

            );
            print_r($datos);

            $url = ControladorPlantilla::url() . "clientes";

            $respuesta = ModeloClientes::mdlEditarClientes($tabla, $datos);
            print_r($respuesta);
            if ($respuesta == "ok") {
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "El cliente se actualizó correctamente",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = "' . $url . '";
                });
            </script>';
            } else {
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Hubo un error al editar el cliente",
                        text: "Por favor, inténtalo de nuevo",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
            }
        }
    }

    static public function ctrEliminarClientes()
    {
        if (isset($_GET["id_cliente"])) {

            $url = ControladorPlantilla::url() . "clientes";
            $tabla = "clientes";
            $datos = $_GET["id_cliente"];

            $respuesta = ModeloClientes::mdlEliminarClientes($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "El cliente se eliminó correctamente",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = "' . $url . '";
                    });
                </script>';
            } else {
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Hubo un error al eliminar el cliente",
                        text: "Por favor, inténtalo de nuevo",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
            }
        }
    }

}