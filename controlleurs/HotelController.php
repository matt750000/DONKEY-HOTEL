
<?php
require_once("./modeles/Hotel.php");
class HotelController

{
    public function home()
    {
        $hotelObjet = new Hotel;
        $hotel = $hotelObjet->read();
        //var_dump($hotel);
        require_once("./Views/Hotelpage.php");
    }
    public function selectShowDetail()
    {
        $selectObjet = new Hotel;
        $select = $selectObjet->showDetail();
        //var_dump($hotel);
        require_once("./Views/Selectpage.php");
    }
}



$hotelPage = new HotelController;
$hotelPage->home();
