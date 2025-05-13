<?php
require_once __DIR__ . '/Base.php';


class Account extends Base
{
    public function getUserById($userId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->execute(['id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }




    public function updateUser($userId, $firstname, $lastname, $email, $phone, $civility)
    {
        $sql = "UPDATE user SET firstname = :firstname, lastname = :lastname, mail = :email, phone = :phone, civility = :civility WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'email'     => $email,
            'phone'     => $phone,
            'civility'  => $civility,
            'id'        => $userId
        ]);
    }



    public function deleteUser($userId)
    {
        $stmt = $this->pdo->prepare("DELETE FROM user WHERE id = :id");
        return $stmt->execute(['id' => $userId]);
    }


    public function changePassword($userId, $newPassword)
    {
        $hashed = password_hash($newPassword, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("UPDATE user SET pass = :password WHERE id = :id");
        return $stmt->execute([
            'password' => $hashed,
            'id'       => $userId
        ]);
    }


    public function findByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE mail = :mail");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
