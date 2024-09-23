<?php
class bookingModel {
    function __construct() {
        $this->booking_id = "";
        $this->user_id = "";
        $this->created_date = "";
        $this->status = "";
    }

    // Simplified insert method
    public static function insert($user_id) {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
    
        // Insert booking
        $query = "INSERT INTO bookings (user_id, created_date, status) 
                  VALUES ($user_id, now(), 'pending')";
    
        if ($mysqli->query($query)) {
           
            $booking_id = $mysqli->insert_id;
            $mysqli->close();
            return $booking_id;
        } else {
            $mysqli->close();
            return false;
        }
    }

    public static function getAll() {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
    
        $query = " SELECT bookings.*, users.username 
        FROM bookings 
        JOIN users ON bookings.user_id = users.user_id;";
        $result = $mysqli->query($query);

        $mysqli->close();
        return $result;
    }

    public static function getChiTiet($bookid) {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
    
        $query = " SELECT 
                    b.booking_id, 
                    b.created_date,
                    b.status, 
                    u.user_id, 
                    u.username, 
                    u.email, 
                    bd.booking_detail_id, 
                    bd.room_id, 
                    bd.start_time, 
                    bd.end_time
                FROM 
                    bookings b
                JOIN 
                    users u ON b.user_id = u.user_id
                JOIN 
                    booking_details bd ON b.booking_id = bd.booking_id
                WHERE 
                    b.booking_id = $bookid;
                ";
        $result = $mysqli->query($query);

        $mysqli->close();
        return $result;
    }
    public static function getByID($id) {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
    
        $query = " SELECT bookings.*, users.username 
        FROM bookings 
        JOIN users ON bookings.user_id = users.user_id where bookings.user_id =  $id;";
        $result = $mysqli->query($query);

        $mysqli->close();
        return $result;
    }
}
?>
