<?php

$nom = $_GET["nombre"];
$nome = "";

// Se evalúa a true ya que $var está vacia
if (empty($nom)) {
    //echo '$var es o bien 0, vacía, o no se encuentrad efinida en absoluto <br>';
    header("Location: http://www.example.com/");
    //header("HTTP/1.0 404 Not Found");
    exit;
exit();
   } else
    {
        var_dump($nom);

        echo '¡Hola ' . htmlspecialchars($_GET["nombre"]) . '!';
        
    }
   
   
//URL -> http://localhost/dev/Ex2/?nombre=Jose

?>

