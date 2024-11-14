<?php

class ControladorUsuarios{

    static public function ctrMostrarUsuarios($item, $valor){

        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($item, $valor);
        return $respuesta;
    } 

    static public function ctrLoginUsuarios()
    {
        if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
            if (preg_match('/^[a-zA-Z0-9_]+$/', $_POST["usuario"])) {

                $encriptar = password_hash(trim($_POST["contrasena"]), PASSWORD_BCRYPT);
                $item = "username";
                $valor = $_POST["usuario"];
                $respuesta = ModeloUsuarios::mdlMostrarUsuarios(
                    $item,
                    $valor
                );
                var_dump($respuesta);


                if ($respuesta && password_verify(trim($_POST["contrasena"]), $respuesta["contra"])) {
                    // Si la verificación es correcta
                    $_SESSION["iniciarSesion"] = "ok";
                    $_SESSION["id_usuario"] = $respuesta["id_usuario"];
                    $_SESSION["nombre_usuario"] = $respuesta["nombre"];
                    $_SESSION["apellido_usuario"] = $respuesta["apellido"];
                
                    echo '<script>window.location = "' . ControladorPlantilla::url() . '";</script>';
                } else {
                    // Si la verificación falla, muestra el error
                    echo '<div class="alert alert-danger mt-3" role="alert">
                        Error al intentar acceder
                        </div>';
                }
            }
        }
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

    static public function ctrEditarUsuarios()
    {
        $tabla = "usuarios";

        if (isset($_POST["id_usuario"])) {
            $contra_encriptada = password_hash($_POST["contra_usuario"], PASSWORD_DEFAULT);
            $datos = array(
                "username" => $_POST["usuario"],
                "contra" => $contra_encriptada,
                "nombre" => $_POST["nombre_usuario"],
                "apellido" => $_POST["apellido_usuario"],
                "id_usuario" => $_POST["id_usuario"]

            );
            print_r($datos);

            $url = ControladorPlantilla::url() . "usuarios";

            $respuesta = ModeloUsuarios::mdlEditarUsuarios($tabla, $datos);
            print_r($respuesta);
            if ($respuesta == "ok") {
                echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "El Usuario se actualizó correctamente",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = "' . $url . '";
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
            }
        }
    }

    static public function ctrSalir(){
        
        session_start(); // Start the session if it's not already started
        session_destroy(); // Destroy the session to log out the user

        // Redirect to the login page
        echo '<script>
        window.location = "' . ControladorPlantilla::url() . 'login"; // Ensure the correct path to your login page
        </script>';
        exit(); // Ensure the script stops executing after the redirect
    }

}