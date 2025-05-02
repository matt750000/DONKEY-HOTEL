<?php
require_once('Base.php');

class Login extends Base
{
    public $table = "user";
    public $account = [
        'email' => '',
        'password' => ''
    ];

    public function FindByEmail($account)
    {
        // Vérifier si l'utilisateur existe déjà
        $sql = "SELECT * FROM user WHERE mail = :mail";
        $check = $this->pdo->prepare($sql);
        $check->execute([':mail' => $account['mail']]);
        $usermail = $check->fetch(PDO::FETCH_ASSOC);
        return $usermail;
    }
}
