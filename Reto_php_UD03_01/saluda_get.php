<?php

echo '¡Hola ' . htmlspecialchars($_GET["nombre"]) . '!';

$_GET["nombre"]='Pedro';

echo $_GET["nombre"];

$_REQUEST["nombre"]='Jesus';

echo $_GET["nombre"];

//URL -> http://localhost/dev/Ex2/?nombre=Jose

?>

