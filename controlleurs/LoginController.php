<?php
require_once("./modeles/Login.php");
session_start();

class LoginController
{
    public function login()
    {
        // Traitement du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérification des champs
            if (
                isset($_POST['email'], $_POST['password'])
                && !empty($_POST['email'])
                && !empty($_POST['password'])
            ) {
                // Nettoyage des données
                $account['email'] = htmlspecialchars(trim($_POST['email']));
                $account['password'] = trim($_POST['password']);

                // Instantiation de l'objet Login
                $userObjet = new Login();
                // Vérifier si l'utilisateur existe déjà
                $user = $userObjet->FindByEmail($account['email']);

                // Vérification de l'existence de l'utilisateur et du mot de passe
                if ($user && password_verify($account['password'], $user['password'])) {
                    // Connexion réussie
                    $_SESSION['success'] = "Vous êtes connecté avec succès.";
                    header("Location: ./Views/Dashboard.php");  // Redirection vers la page d'accueil ou dashboard
                    exit();
                } else {
                    // Erreur de connexion
                    $_SESSION['erreur'] = "Email ou mot de passe incorrect.";
                }
            } else {
                $_SESSION['erreur'] = "Veuillez remplir tous les champs.";
            }
        }
        // Afficher la page de login
        require_once("./Views/Loginpage.php");
    }
}

// Instanciation et appel du contrôleur
$loginPage = new LoginController;
$loginPage->login();
