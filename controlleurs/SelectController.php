<?php
session_start();
require_once("./modeles/Hotel.php");

class SelectController
{
    public function search()
    {



        if (!empty($_SESSION['search_data'])) {
            require_once(__DIR__ . "/../Views/SelectPage.php");
            // Récupération et nettoyage des données de session
            $search = $_SESSION['search_data'];
            $cityId = (int) trim($search['city']);
            $start = htmlspecialchars(trim($search['startdate']));
            $end = htmlspecialchars(trim($search['enddate']));


            // Récupération des hôtels disponibles
            $hotelSelectModel = new Hotel();
            $cityName = $hotelSelectModel->getCityNameById($cityId);
            $hotelsDisponibles = $hotelSelectModel->showDetail($cityId);

            // var_dump($hotelsDisponibles);
            // exit;
            $_SESSION['hotelsDisponibles'] = $hotelsDisponibles;
            $_SESSION['search'] = [
                'city' => $cityName,
                'startdate' => $start,
                'enddate' => $end
            ];
            //var_dump($hotelsDisponibles) . "<br>";
            //var_dump($_SESSION['user_id']) . "<br>";
            //var_dump($search);
            //exit;

            // Redirection vers la page de résultat
            // header('Location: http://localhost:8000/index.php?page=result');
            // exit;
        }
    }
}

// Lancer le contrôleur
$controller = new SelectController();
$controller->search();
