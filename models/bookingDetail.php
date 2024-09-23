<?php
class bookingDetailModel{
    function __construct() {
        $this->booking_detail_id = "";
        $this->booking_id = "";
        $this->room_id = "";
        $this->start_time = "";
        $this->end_time = "";
    }

    public static function insert($booking_id , $room_id, $start_time, $end_time) {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "INSERT INTO booking_details (booking_id, room_id, start_time, end_time) 
        VALUES ($booking_id, '$room_id', '$start_time', '$end_time')";
        $result = $mysqli->query($query);
        

        if ($result) {
            return true; 
        } else {
            return false; 
        }
    }
   
   
}
?>