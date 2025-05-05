<?php
session_start();
require_once("./modeles/User.php");

class UserController
{
    public function login()
    {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (
                isset($_POST['email'], $_POST['password']) &&
                !empty($_POST['email']) &&
                !empty($_POST['password'])
            ) {
                $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
                $password = trim($_POST['password']);

                if (!$email) {
                    $error = "Email invalide.";
                } else {
                    $userObjet = new User();
                    $user = $userObjet->FindByEmail($email);

                    if ($user && password_verify($password, $user['password'])) {
                        $_SESSION['success'] = "Vous êtes connecté avec succès.";
                        header('Location: Hotel.php');
                        exit();
                    } else {
                        $error = "Email ou mot de passe incorrect.";
                    }
                }
            } else {
                $error = "Veuillez remplir tous les champs.";
            }
        }


        require_once("./Views/Loginpage.php");
    }
}

$loginPage = new UserController;
$loginPage->login();
