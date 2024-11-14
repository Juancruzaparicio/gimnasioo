<?php

class ControladorEspecialidades{

    static public function ctrMostrarEspecialidades($item, $valor){

        $respuesta = ModeloEspecialidades::mdlMostrarEspecialidades($item, $valor);
        return $respuesta;
    } 

    static public function ctrAgregarEspecialidades()
    {

        if (isset($_POST["nombre_especialidad"])) {
            $tabla = "especialidades";

            $datos = array(
                "nombre" => $_POST["nombre_especialidad"],    
            );

            //print_r($datos);

            $url = ControladorPlantilla::url() . "especialidades";
            echo $url;
            $respuesta = ModeloEspecialidades::mdlAgregarEspecialidades($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "La especialidad se agregó correctamente",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = "' . $url . '";
                    });
                </script>';
            }

        }
    }

    static public function ctrEditarEspecialidades()
    {
        $tabla = "especialidades";

        if (isset($_POST["id_especialidad"])) {

            $datos = array(
                "nombre" => $_POST["nombre_especialidad"],
                "id_especialidad" => $_POST["id_especialidad"]

            );
            print_r($datos);

            $url = ControladorPlantilla::url() . "especialidades";

            $respuesta = ModeloEspecialidades::mdlEditarEspecialidades($tabla, $datos);
            print_r($respuesta);
            if ($respuesta == "ok") {
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "La especialidad se actualizó correctamente",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = "' . $url . '";
                });
            </script>';
            }
        }
    }

    static public function ctrEliminarEspecialidades()
    {
        if (isset($_GET["id_especialidad"])) {

            $url = ControladorPlantilla::url() . "especialidades";
            $tabla = "especialidades";
            $datos = $_GET["id_especialidad"];

            $respuesta = ModeloEspecialidades::mdlEliminarEspecialidades($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "La especialidad se eliminó correctamente",
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