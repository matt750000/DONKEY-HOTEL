<?php
session_start();
require_once("./modeles/Hotel.php");

class HotelController

{
    public function home()
    {
        if (empty($_SESSION['user'])) {
            $_SESSION['erreur'] = "Vous devez être connecté pour réserver.";
            header('Location: index.php?page=login');
            exit;
        }
        $hotelPage = new Hotel;
        $hotel = $hotelPage->read();
        $_SESSION['ville_list'] = $hotel;
        //var_dump($hotel);
        //exit;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (
                !empty($_POST['startdate']) && !empty($_POST['enddate']) &&
                !empty($_POST['city'])
            ) {
                // Nettoyage
                $user['startdate'] = htmlspecialchars(trim($_POST['startdate']));
                $user['enddate'] = htmlspecialchars(trim($_POST['enddate']));
                $user['city'] = (int) trim($_POST['city']);
                if (strtotime($user['startdate']) > strtotime($user['enddate'])) {
                    $_SESSION['erreur'] = "La date d'arrivée doit être avant la date de départ.";
                    header('Location: http://localhost:8000/index.php?page=hotel');
                    exit;
                }


                // Sauvegarde l'ID dans la session pour l'utiliser ailleurs



                $_SESSION['success'] = "Nous recherchons un hôtel...";
                $_SESSION['search_data'] = $user;
                //var_dump($user);
                //exit;
                // Redirection vers le profil de l'utilisateur avec son ID
                header('Location: http://localhost:8000/index.php?page=select');
                exit;
            } else {
                $_SESSION['erreur'] = "Veuillez remplir tous les champs.";
                header('Location: http://localhost:8000/index.php?page=hotel'); // Redirige si le formulaire est incomplet
                exit;
            }
        }
        // Afficher la page de login
        require_once("./Views/Hotelpage.php");
    }
}
// Instanciation et appel du contrôleur
$hotelPage = new HotelController;
$hotelPage->home();
