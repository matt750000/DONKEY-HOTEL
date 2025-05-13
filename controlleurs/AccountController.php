<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../modeles/User.php'; // ← c’est ton modèle
class AccountController
{
    private $accountModel;


    public function __construct()
    {
        $this->accountModel = new User(); // ← instanciation de ton modèle
    }
    public function handleRequest()
    {

        if (empty($_SESSION['user'])) {
            $_SESSION['erreur'] = "Vous devez être connecté pour réserver.";
            header('Location: index.php?page=login');
            exit;
        }
        // //var_dump($_SESSION['user']);
        // exit;
        $user = $_SESSION['user'];
        $userId = $user['id'];
        $user = $this->accountModel->getUserById($userId);
        // var_dump($user);
        // exit;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['update'])) {
                $firstname = trim($_POST['prenom']);
                $lastname  = trim($_POST['nom']);
                $email     = trim($_POST['email']);
                $phone     = trim($_POST['phone']);
                $civility  = trim($_POST['civility']);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $message = "Adresse email invalide.";
                } else {
                    $success = $this->accountModel->updateUser($userId, $firstname, $lastname, $email, $phone, $civility);
                    $message = $success ? "Mise à jour réussie." : "Erreur lors de la mise à jour.";
                    $user = $this->accountModel->getUserById($userId);
                }
            }
            if (isset($_POST['delete'])) {
                $this->accountModel->deleteUser($userId);
                session_destroy();
                header('Location: login.php');
                exit();
            }
        }
        // Vue à afficher
        require_once(__DIR__ . '/../Views/accountPage.php');
    }
}
$controller = new AccountController();
$controller->handleRequest();
