<?php
require_once('Base.php');

class User extends Base
{
    public $table = "user";
    public $email = [
        'mail' => '',
        'pass' => ''
    ];

    public function FindByEmail($mail)
    {

        $sql = "SELECT * FROM user WHERE mail = :mail";
        $check = $this->pdo->prepare($sql);
        $check->execute([':mail' => $mail]);
        return $check->fetch(PDO::FETCH_ASSOC);
        //return $this->pdo->lastInsertId();
    }
    public function logout()
    {
        session_unset();
        session_destroy();

        header("Location: login.php");
    }
}
