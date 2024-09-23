<?php
class roomModel{
    function __construct() {
        $this->room_id = "";
        $this->room_name = "";
        $this->capacity = "";
        $this->block = "";
        $this->room_condition = "";
        $this->type = "";
    }


    public static function totalRoomAvailable(){
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "
        SELECT r.room_id, r.room_name, r.capacity, r.block,
            CASE
                WHEN d.room_id IS NOT NULL 
                AND (NOW() BETWEEN d.start_time AND d.end_time)
                AND b.status IN ('confirm', 'pending')
                THEN 'unavailable'
                ELSE 'available'
            END AS status
        FROM rooms r
        LEFT JOIN booking_details d ON r.room_id = d.room_id
        LEFT JOIN bookings b ON d.booking_id = b.booking_id
        GROUP BY r.room_id;

    ";
        $result = $mysqli->query($query);

        $mysqli->close();
        return  $result;
    }

    public static function getRoomByID($id){
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "select * from rooms where room_id = '$id'";

        $result = $mysqli->query($query);

        $mysqli->close();
        return  $result;
    }

    public static function updateRoom($room_id, $room_name, $capacity, $block, $room_condition, $type) {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "UPDATE rooms SET room_name = '$room_name', capacity = $capacity, block = '$block', room_condition = '$room_condition', type = '$type' WHERE room_id = '$room_id'";
        $result = $mysqli->query($query);
        

        if ($result) {
            return true; // Update thành công
        } else {
            return false; // Update thất bại
        }
    }
   
    public static function getAvailableRoom($capacity,$return_time, $borrow_time){
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT r.room_id, r.room_name, r.capacity, r.block,
                    CASE
                        WHEN d.room_id IS NOT NULL 
                        AND (NOW() BETWEEN d.start_time AND d.end_time)
                        AND b.status IN ('confirm', 'pending')
                        THEN 'unavailable'
                        ELSE 'available'
                    END AS status
                FROM rooms r
                LEFT JOIN booking_details d ON r.room_id = d.room_id
                LEFT JOIN bookings b ON d.booking_id = b.booking_id
                WHERE r.capacity > $capacity
                AND (d.room_id IS NULL 
                    OR NOT (d.start_time < '$return_time' AND d.end_time > '$borrow_time'))
                AND r.room_condition = 'good'
                AND r.type = 'public'
                GROUP BY r.room_id;
                ";

        $result = $mysqli->query($query);

        $mysqli->close();
        return  $result;
    }

}
?>