<?php

class ControladorEntrenadores{

    static public function ctrMostrarEntrenador($item, $valor){

        $respuesta = ModeloEntrenadores::mdlMostrarEntrenadores($item, $valor);
        return $respuesta;
    } 

    static public function ctrAgregarEntrenadores()
    {

        if (isset($_POST["dni_entrenador"])) {
            $tabla = "entrenadores";

            $datos = array(
                "dni" => $_POST["dni_entrenador"],
                "nombre" => $_POST["nombre_entrenador"],
                "apellido" => $_POST["apellido_entrenador"],
                "telefono" => $_POST["telefono_entrenador"],
                "mail" => $_POST["mail_entrenador"],
                "especialidad" => $_POST["id_especialidad"],
                "fecha_contratacion" => $_POST["fecha_contratacion_entrenador"],
                "estado" => $_POST["estado_entrenador"]
                
            );

            //print_r($datos);

            $url = ControladorPlantilla::url() . "entrenadores";
            echo $url;
            $respuesta = ModeloEntrenadores::mdlAgregarEntrenadores($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "El Entrenador se agregó correctamente",
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
                        title: "Hubo un error al agregar el entrenador",
                        text: "Por favor, inténtalo de nuevo",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
            }

        }
    }

    static public function ctrEditarEntrenadores()
    {
        $tabla = "entrenadores";

        if (isset($_POST["id_entrenador"])) {

            $datos = array(
                "dni" => $_POST["dni_entrenador"],
                "nombre" => $_POST["nombre_entrenador"],
                "apellido" => $_POST["apellido_entrenador"],
                "telefono" => $_POST["telefono_entrenador"],
                "mail" => $_POST["mail_entrenador"],
                "especialidad" => $_POST["id_especialidad"],
                "fecha_contratacion" => $_POST["fecha_contratacion_entrenador"],
                "estado" => $_POST["estado_entrenador"],
                "id_entrenador" => $_POST["id_entrenador"]

            );
            print_r($datos);

            $url = ControladorPlantilla::url() . "entrenadores";

            $respuesta = ModeloEntrenadores::mdlEditarEntrenadores($tabla, $datos);
            print_r($respuesta);
            if ($respuesta == "ok") {
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "El Entrenador se actualizó correctamente",
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
                        title: "Hubo un error al editar el entrenador",
                        text: "Por favor, inténtalo de nuevo",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
            }
        }
    }

    static public function ctrEliminarEntrenadores()
    {
        if (isset($_GET["id_entrenador"])) {

            $url = ControladorPlantilla::url() . "entrenadores";
            $tabla = "entrenadores";
            $datos = $_GET["id_entrenador"];

            $respuesta = ModeloEntrenadores::mdlEliminarEntrenadores($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "El Entrenador se eliminó correctamente",
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
                        title: "Hubo un error al eliminar el entrenador",
                        text: "Por favor, inténtalo de nuevo",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
            }
        }
    }

}