<?php
session_start();
require_once("./modeles/Reservation.php");

class EditController
{
    private $editModel;

    public function __construct()
    {
        $this->editModel = new Reservation();
    }
    public function edit()
    {

        if (isset($_GET['$client_id']) && !empty($_GET['$client_id'])) {

            // nettoie l'id de envoyé de code html 
            $client_id = strip_tags($_GET['$client_id']);

            $result = $this->editModel->editReservation($$client_id);
            if (!$result) {
                $_SESSION['erreur'] = "reservation invalide";
                header('Location: index.php?page=login');
            }

            require_once("./Views/editPage.php");
        } else {
            $_SESSION['erreur'] = "url invalide";
            header('Location: index.php?page=login');
        }
    }
}

$controller = new EditController();
$controller->edit();
