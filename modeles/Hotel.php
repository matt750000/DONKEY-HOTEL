
<?php
require_once('Base.php');

class Hotel extends Base
{
    public $table = "city";


    public function read()
    {
        $sql = 'select * from city '; //. $this->table;
        $query = $this->pdo->query($sql);
        //$query = $this->pdo->query($sql);
        //$query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;

        //return $query;
    }

    public function showDetail($cityId)
    {
        $sql = 'SELECT hotel.name AS hotel_name, hotel.pricenight, city.name AS city_name
                FROM hotel
                LEFT JOIN city ON hotel.city_id = city.id
                WHERE city.id = :cityId'; //. $this->table;
        $query = $this->pdo->prepare($sql);
        $query->execute([':cityId' => $cityId]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCityNameById($cityId)
    {
        $sql = "SELECT name FROM city WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $cityId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['name'] : null;
    }
}
