<?php
session_start();
require_once('./modeles/Reservation.php');

class MyreservationController
{

    public function show()
    {
        if (empty($_SESSION['user'])) {
            $_SESSION['erreur'] = "Vous devez être connecté pour réserver.";
            header('Location: index.php?page=login');
            exit;
        }

        $user = $_SESSION['user'];
        $userId = $user['id'];
        $showReDetails = new Reservation;

        // Toujours appeler la méthode, même en GET
        $showbg = $showReDetails->showMyReservation($userId);

        // Si POST, tu peux faire des traitements supplémentaires
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
        //var_dump($userId);
        // Passer à la vue
        require_once(__DIR__ . '/../Views/myReservationPage.php');
    }
}
$controller = new MyreservationController();
$controller->show();
