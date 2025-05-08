<?php
session_start();
require_once("./modeles/Register.php");

class RegisterController
{
    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (
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
                $user['pass'] = md5($_POST['pass']);

                try {
                    // Création de l'objet Register et ajout de l'utilisateur
                    $formObjet = new Register();
                    if ($formObjet->emailExists($user['mail'])) {
                        $_SESSION['erreur'] = "Cet email est déjà utilisé.";
                        header('Location: http://localhost:8000/index.php');
                        exit;
                    }
                    $userId = $formObjet->addUser($user); // Récupère l'ID de l'utilisateur ajouté

                    // Sauvegarde l'ID dans la session pour l'utiliser ailleurs
                    $_SESSION['user_id'] = $userId;
                    $_SESSION['user_data'] = [
                        'lastname' => $user['lastname'],
                        'firstname' => $user['firstname'],
                        'mail' => $user['mail'],
                        'phoneNumber' => $user['phoneNumber'],
                        'civility' => $user['civility'],
                    ];

                    $_SESSION['success'] = "Inscription réussie. Vous êtes maintenant connecté.";

                    // Redirection vers le profil de l'utilisateur avec son ID
                    header('Location: http://localhost:8000/index.php');
                    exit;
                } catch (PDOException $e) {
                    $_SESSION['erreur'] = "Erreur lors de l'insertion : " . $e->getMessage();
                    // header('Location: registerPage.php'); // Redirige si erreur
                    //exit;
                }
            } else {
                $_SESSION['erreur'] = "Veuillez remplir tous les champs.";
                header('Location: http://localhost:8000/index.php?page=register'); // Redirige si le formulaire est incomplet
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
