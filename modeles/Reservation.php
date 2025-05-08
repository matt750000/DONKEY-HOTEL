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
}
