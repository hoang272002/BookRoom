<?php
class chitietController {
    public function index($bookid)
    {
        $list = bookingModel::getChiTiet($bookid);
        $bookid = $username = $created_date = $status= "";
        foreach ($list as $row){
            $bookid = $row['booking_id'];
            $username = $row['username'];
            $created_date = $row['created_date'];
            $status = $row['status'];
            break;
        }
        require("views/chiTiet.phtml");
    }
}
?>