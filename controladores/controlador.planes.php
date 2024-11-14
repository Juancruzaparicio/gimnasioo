<?php

class ControladorPlanes{

    static public function ctrMostrarPlanes($item, $valor){

        $respuesta = ModeloPlanes::mdlMostrarPlanes($item, $valor);
        return $respuesta;
    } 

    static public function ctrAgregarPlanes()
    {

        if (isset($_POST["nombre_plan"])) {
            $tabla = "plan_entrenamiento";

            $datos = array(
                "nombre" => $_POST["nombre_plan"],
                "codigo" => $_POST["codigo_plan"],
                "descripcion" => $_POST["descripcion_plan"],
                "duracion_semanas" => $_POST["duracion"],
                "cantidadsesiones_semana" => $_POST["cantidad"],
                "id_entrenador" => $_POST["entrenador"]
                
            );

            //print_r($datos);

            $url = ControladorPlantilla::url() . "planes";
            echo $url;
            $respuesta = ModeloPlanes::mdlAgregarPlanes($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "El Plan se agregó correctamente",
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
                        title: "Hubo un error al agragar el plan",
                        text: "Por favor, inténtalo de nuevo",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
            }

        }
    }

    static public function ctrEditarPlanes()
    {
        $tabla = "plan_entrenamiento";

        if (isset($_POST["id_plan"])) {

            $datos = array(
                "nombre" => $_POST["nombre_plan"],
                "codigo" => $_POST["codigo_plan"],
                "descripcion" => $_POST["descripcion_plan"],
                "duracion_semanas" => $_POST["duracion"],
                "cantidadsesiones_semana" => $_POST["cantidad"],
                "id_entrenador" => $_POST["entrenador"],
                "id_plan" => $_POST["id_plan"]

            );
            print_r($datos);

            $url = ControladorPlantilla::url() . "planes";

            $respuesta = ModeloPlanes::mdlEditarPlanes($tabla, $datos);
            print_r($respuesta);
            if ($respuesta == "ok") {
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "El Plan se actualizó correctamente",
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
                        title: "Hubo un error al editar el plan",
                        text: "Por favor, inténtalo de nuevo",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
            }
        }
    }

    static public function ctrEliminarPlanes()
    {
        if (isset($_GET["id_plan"])) {

            $url = ControladorPlantilla::url() . "planes";
            $tabla = "plan_entrenamiento";
            $datos = $_GET["id_plan"];

            $respuesta = ModeloPlanes::mdlEliminarPlanes($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "El Plan se eliminó correctamente",
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
                        title: "Hubo un error al eliminar el plan",
                        text: "Por favor, inténtalo de nuevo",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
            }
        }
    }

}