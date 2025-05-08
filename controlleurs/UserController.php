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
                !empty($_POST['mail']) &&
                !empty($_POST['pass'])
            ) {
                $mail = filter_var(trim($_POST['mail']), FILTER_VALIDATE_EMAIL);
                $pass = md5($_POST['pass']);
                //var_dump($pass);


                if (!$mail) {
                    $error = "Email invalide.";
                } else {
                    $userObjet = new User();
                    $user = $userObjet->FindByEmail($mail);
                    // var_dump($pass);
                    // echo "<br>";
                    // var_dump($_SESSION['user']);
                    // exit;
                    // echo "<br>";
                    // var_dump(password_verify($pass, $user['pass']));
                    //exit;

                    if ($pass == $user["pass"]) {
                        $_SESSION['success'] = "Vous êtes connecté avec succès.";
                        $_SESSION['user'] = [
                            'id' => $user['id'],
                            'email' => $user['mail'],
                            'prenom' => $user['firstname'],
                            'nom' => $user['lastname'],
                            'phone' => $user['phoneNumber'],
                        ];
                        header('Location: http://localhost:8000/index.php?page=hotel');
                        exit();
                    } else {
                        $error = "Email ou mot de passe incorrect.";
                    }
                }
            } else {
                $error = "Veuillez remplir tous les champs.";
            }
        }


        require_once("./Views/LoginPage.php");
    }


    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php?page=login");
    }
}

$loginPage = new UserController;
$loginPage->login();
