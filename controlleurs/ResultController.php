<?php
session_start();
require_once('./modeles/Reservation.php');

class ResultController
{

    public function reserver()
    {
        // Vérifie que l'utilisateur est connecté
        if (empty($_SESSION['user'])) {
            $_SESSION['erreur'] = "Vous devez être connecté pour réserver.";
            header('Location: index.php?page=login');
            exit;
        }
        $user = $_SESSION['user'];
        $userId = $user['id'];
        $hotelName = $_POST['hotel_name'] ?? '';
        //$priceNight = $_POST['price_night'] ?? '';
        $startDate = $_POST['start_date'] ?? '';
        $endDate = $_POST['end_date'] ?? '';



        // // $hotelId   = $_POST['hotel_id']   ?? null;
        // // $startDate = $_POST['startdate']  ?? null;
        // // $endDate   = $_POST['enddate']    ?? null;

        // // Validation simple
        // // if (!$hotelName || !$priceNight || !$startDate || !$endDate || strtotime($endDate) <= strtotime($startDate)) {
        // //     $_SESSION['erreur'] = "Données de réservation invalides.";
        // //     header('Location: index.php?page=select');
        // //     exit;
        // }
        $reservationOption = new Reservation();
        $priceOption = $reservationOption->option();
        $reservationModel = new Reservation();
        $hotelId = $reservationModel->getHotelIdByName($hotelName);
        $priceNight = $reservationModel->getPrixParNuit($hotelId);;
        if (!$priceNight) {
            $_SESSION['erreur'] = "Impossible de récupérer le tarif de l'hôtel.";
            header('Location: index.php?page=result');
            exit;
        }

        $nbNuits = (strtotime($endDate) - strtotime($startDate)) / 86400;
        $total = $nbNuits * $priceNight;
        require_once(__DIR__ . '/../Views/resultPage.php');

        $success = $reservationModel->createReservation($userId, $hotelId, $startDate, $endDate, $total);

        if ($success) {
            $_SESSION['success'] = "Réservation effectuée avec succès !";
            header('Location: index.php?page=confirmation');
        } else {
            $_SESSION['erreur'] = "Erreur lors de la réservation.";
            header('Location: index.php?page=result');
        }

        exit;
    }
}
$controller = new ResultController();
$controller->reserver();
