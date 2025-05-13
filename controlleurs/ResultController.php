<?php
session_start();
require_once('./modeles/Reservation.php');

class ResultController
{

    public function reserver()
    {

        if (empty($_SESSION['user'])) {
            $_SESSION['erreur'] = "Vous devez être connecté pour réserver.";
            header('Location: index.php?page=login');
            exit;
        }

        $reservationModel = new Reservation();
        $user = $_SESSION['user'];
        $userId = $user['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['valider']) && $_POST['valider'] === '1') {

            $hotelName = $_POST['hotel_name'] ?? null;
            $hotelId = $reservationModel->getHotelIdByName($hotelName);
            $startDate = $_POST['start_date'] ?? null;
            $endDate = $_POST['end_date'] ?? null;
            $priceNight = $_POST['price_night'] ?? 0;
            $selectedOptions = $_POST['options'] ?? [];

            $nbNuits = (strtotime($endDate) - strtotime($startDate)) / 86400;
            $total = $nbNuits * $priceNight;

            // Crée la réservation
            $success = $reservationModel->createReservation($userId, $hotelId, $startDate, $endDate, $total);

            if ($success) {
                $reservationId = $reservationModel->getLastInsertId();

                // Enregistre les options sélectionnées
                foreach ($selectedOptions as $optionId) {

                    $reservationModel->addOptionToReservation($reservationId, $optionId);
                }

                $_SESSION['success'] = "Réservation effectuée avec succès !";
                header('Location: index.php?page=myReservation');
            } else {
                $_SESSION['erreur'] = "Erreur lors de la réservation.";
                header('Location: index.php?page=result');
            }

            exit;
        }

        // Sinon : affichage du formulaire
        $hotelName = $_POST['hotel_name'] ?? '';
        $startDate = $_POST['start_date'] ?? '';
        $endDate = $_POST['end_date'] ?? '';

        $priceOption = $reservationModel->option();
        $hotelId = $reservationModel->getHotelIdByName($hotelName);
        $priceNight = $reservationModel->getPrixParNuit($hotelId);
        $nbNuits = (strtotime($endDate) - strtotime($startDate)) / 86400;
        $total = $nbNuits * $priceNight;
        // Affiche le formulaire
        require_once(__DIR__ . '/../Views/resultPage.php');
    }
}
$controller = new ResultController();
$controller->reserver();
