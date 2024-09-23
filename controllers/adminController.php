<?php
class adminController {
    public function index()
    {
        $bookings = bookingModel::getAll();
        require("views/admin.phtml");
    }

}
?>