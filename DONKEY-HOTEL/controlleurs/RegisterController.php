<?php
session_start();
require_once("./modeles/Register.php");

class RegisterController
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (
                isset($_POST['mail'], $_POST['lastname'], $_POST['civility'], $_POST['pass'], $_POST['firstname'], $_POST['phoneNumber']) &&
                !empty($_POST['firstname']) && !empty($_POST['mail']) &&
                !empty($_POST['pass']) && !empty($_POST['phoneNumber']) &&
                !empty($_POST['lastname']) && !empty($_POST['civility'])
            ) {
                // Nettoyage et hashage
                $user['lastname'] = htmlspecialchars(trim($_POST['lastname']));
                $user['firstname'] = htmlspecialchars(trim($_POST['firstname']));
                $user['mail'] = htmlspecialchars(trim($_POST['mail']));
                $user['phoneNumber'] = htmlspecialchars(trim($_POST['phoneNumber']));
                $user['civility'] = htmlspecialchars(trim($_POST['civility']));
                $user['pass'] = password_hash(htmlspecialchars(trim($_POST['pass'])), PASSWORD_DEFAULT);

                try {
                    // Création de l'objet Register et ajout de l'utilisateur
                    $formObjet = new Register();
                    $userId = $formObjet->addUser($user); // Récupère l'ID de l'utilisateur ajouté

                    // Sauvegarde l'ID dans la session pour l'utiliser ailleurs
                    $_SESSION['user_id'] = $userId;
                    $_SESSION['success'] = "Inscription réussie. Vous êtes maintenant connecté.";

                    // Redirection vers le profil de l'utilisateur avec son ID
                    header('Location: HOTEL.php?id=' . $userId);
                    exit;
                } catch (PDOException $e) {
                    $_SESSION['erreur'] = "Erreur lors de l'insertion : " . $e->getMessage();
                    // header('Location: registerPage.php'); // Redirige si erreur
                    //exit;
                }
            } else {
                $_SESSION['erreur'] = "Veuillez remplir tous les champs.";
                header('Location: registerPage.php'); // Redirige si le formulaire est incomplet
                exit;
            }
        }
        // Afficher la page de login
        require_once("./Views/RegisterPage.php");
    }
}
// Instanciation et appel du contrôleur
$registerPage = new RegisterController;
$registerPage->register();
