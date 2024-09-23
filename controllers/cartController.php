<?php
class cartController {
    public function index()
    {
        $VIEW = "views/cart.phtml";
        require("template/template.phtml");
    }

    public function insert(){
        if(isset($_POST['btnAddbook'])){
            session_start();
            $booking_id = bookingModel::insert($_SESSION['user']->user_id);

            foreach ($_SESSION['cart'] as $index => $room) {

               $kq =  bookingDetailModel::insert($booking_id,$room['roomId'], $room['borrowDate'],$room['returnDate']);
                if($kq == true){
                    unset($_SESSION['cart'][$index]);
                }
            }
        }

        header("Location: index.php");
    }
}
?>