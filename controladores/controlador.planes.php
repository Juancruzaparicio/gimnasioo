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
            }
        }
    }

}