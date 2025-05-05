<?php
require_once('Base.php');

class User extends Base
{
    public $table = "user";
    public $account = [
        'mail' => '',
        'pass' => ''
    ];

    public function FindByEmail($account)
    {

        $sql = "SELECT * FROM user WHERE mail = :mail";
        $check = $this->pdo->prepare($sql);
        $check->execute([':mail' => $account['mail']]);
        $usermail = $check->fetch(PDO::FETCH_ASSOC);
        return $usermail;
        //return $this->pdo->lastInsertId();
    }
}
