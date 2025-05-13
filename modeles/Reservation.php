<?php
require_once('Base.php');

class Reservation extends Base
{

    public function createReservation($userId, $hotelId, $startDate, $endDate, $total)
    {
        $sql = "INSERT INTO reservation (startdate, enddate, total, client_id, hotel_id)
                VALUES (:startdate, :enddate, :total, :client_id, :hotel_id)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'startdate' => $startDate,
            'enddate' => $endDate,
            'total' => $total,
            'client_id' => $userId,
            'hotel_id' => $hotelId
        ]);
        if (!$success) {
            var_dump($stmt->errorInfo()); // Déboguer les erreurs d'exécution de la requête
        }

        return $success;
    }


    public function getHotelIdByName($hotelName)
    {
        $hotelName = trim(strtolower($hotelName));
        $sql = "SELECT id FROM hotel WHERE name = :name";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['name' => $hotelName]);
        return $stmt->fetchColumn(); // retourne l'id de l'hôtel
    }

    public function option()
    {
        $sql = "SELECT * FROM option_hotel";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getPrixParNuit($hotelId)
    {
        $sql = "SELECT pricenight FROM hotel WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $hotelId]);
        return $stmt->fetchColumn();
    }


    public function getLastInsertId()
    {
        return $this->pdo->lastInsertId();
    }



    public function addOptionToReservation($reservationId, $optionId)
    {
        $sql = "INSERT INTO option_hotel_has_reservation (reservation_id, option_hotel_id)
            VALUES (:reservation_id, :option_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':reservation_id', $reservationId, PDO::PARAM_INT);
        $stmt->bindParam(':option_id', $optionId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function showMyReservation($client_id)
    {

        $sql = "
        SELECT reservation.startdate, reservation.enddate, city.name 
        FROM mydb.reservation
        INNER JOIN mydb.hotel 
        ON reservation.hotel_id = hotel.id  
        INNER JOIN mydb.city 
        ON hotel.city_id = city.id
        WHERE reservation.client_id = :client_id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':client_id' => $client_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function editReservation($client_id)
    {
        $sql = 'select * from reservation WHERE reservation.id = :id;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $client_id, PDO::PARAM_INT);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
