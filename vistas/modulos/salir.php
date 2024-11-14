<?php
session_start();
session_destroy();
echo '<script>
window.location = "' . ControladorPlantilla::url() . 'login"; // Ensure the correct path to your login page
</script>';
exit();