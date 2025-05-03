<?php
require_once('Base.php');

class Register extends Base
{
    public $user = [
        'lastname' => '',
        'civility' => '',
        'phoneNumber' => '',
        'firstname' => '',
        'pass' => '',
        'mail' => ''

    ];

    public function addUser($user)
    {
        $sql = "INSERT INTO user (firstname, civility, lastname, phoneNumber, pass, mail) VALUES (:firstname, :civility, :lastname, :phoneNumber, :pass, :mail)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':lastname' => $user['lastname'],
            ':civility' => $user['civility'],
            ':phoneNumber' => $user['phoneNumber'],
            ':mail' => $user['mail'],
            ':pass' => $user['pass'],
            ':firstname' => $user['firstname']
        ]);
        return $this->pdo->lastInsertId();
    }
}
