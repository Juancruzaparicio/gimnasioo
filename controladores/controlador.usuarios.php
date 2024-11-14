<?php

class ControladorUsuarios{

    static public function ctrMostrarUsuarios($item, $valor){

        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($item, $valor);
        return $respuesta;
    } 

    static public function ctrLoginUsuarios()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
            if (preg_match('/^[a-zA-Z0-9_]+$/', $_POST["usuario"])) {

                $encriptar = password_hash(trim($_POST["contrasena"]), PASSWORD_BCRYPT);
                $item = "username";
                $valor = $_POST["usuario"];
                var_dump($_POST["usuario"]);
                $respuesta = ModeloUsuarios::mdlMostrarUsuarios(
                    $item,
                    $valor
                );

                if ($respuesta && password_verify(trim($_POST["contrasena"]), $respuesta["contra"])) {
                    // Si la verificación es correcta
                    $_SESSION["iniciarSesion"] = "ok";
                    $_SESSION["id_usuario"] = $respuesta["id_usuario"];
                    $_SESSION["nombre_usuario"] = $respuesta["nombre"];
                    $_SESSION["apellido_usuario"] = $respuesta["apellido"];
                
                    echo '<script>window.location = "' . ControladorPlantilla::url() . '";</script>';
                } else {

                    session_unset(); 
                    session_destroy();
                    session_start();
                    echo '<div class="alert alert-danger mt-3" role="alert">
                        Error al intentar acceder
                        </div>';
                }
            }
        }
    }

    static public function ctrAgregarUsuarios()
    {

        if (isset($_POST["usuario"])) {
            $tabla = "usuarios";

            $contra_encriptada = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);

            $datos = array(
                "username" => $_POST["usuario"],
                "contra" => $contra_encriptada,
                "nombre" => $_POST["nombre_usuario"],
                "apellido" => $_POST["apellido_usuario"]
            );

            // print_r($datos);

            $url = ControladorPlantilla::url() . "usuarios";
            $respuesta = ModeloUsuarios::mdlAgregarUsuarios($tabla, $datos);

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
            } else {
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Hubo un error al editar el usuario",
                        text: "Por favor, inténtalo de nuevo",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
            }
        }
    }

    static public function ctrEliminarUsuarios()
    {
        if (isset($_GET["id_usuario"])) {

            $url = ControladorPlantilla::url() . "usuarios";
            $tabla = "usuarios";
            $datos = $_GET["id_usuario"];

            $respuesta = ModeloUsuarios::mdlEliminarUsuarios($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "El Usuario se eliminó correctamente",
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
                        title: "Hubo un error al eliminar el usuario",
                        text: "Por favor, inténtalo de nuevo",
                        confirmButtonText: "Aceptar"
                    });
                </script>';
            }
        }
    }

}