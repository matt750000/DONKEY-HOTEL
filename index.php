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
    case 'select':
        require_once("./controlleurs/SelectController.php");
        break;
    case 'result':
        require_once("./controlleurs/ResultController.php");
        break;
    case 'myReservation':
        require_once("./controlleurs/MyreservationController.php");
        break;
    case 'account':
        require_once("./controlleurs/AccountController.php");
        break;
    case 'edit?':
        require_once("./controlleurs/EditController.php");
        break;
    case 'logout':
        require_once("./controlleurs/UserController.php");
        $logeOut = new UserController();
        $logeOut->logout();
        break;
    case 'accueil':
        require_once("./controlleurs/UserController.php");
        break;
    case 'login':
        require_once("./controlleurs/UserController.php");
        break;
}
