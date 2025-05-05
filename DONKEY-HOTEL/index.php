<?php


// Lecture de la page demandée
$page = $_GET['page'] ?? 'accueil'; // Valeur par défaut

switch ($page) {
    case 'index':
        require_once("./controlleurs/UserController.php");

        break;
    case 'register':
        require_once("./controlleurs/RegisterController.php");
        break;
    case 'hotel':
        require_once("./controlleurs/HotelController.php");
        break;
    case 'accueil':
        require_once("./controlleurs/UserController.php");
        break;
}
