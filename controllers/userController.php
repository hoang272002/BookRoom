<?php
class userController {
    public function index($id)
    {
        $bookings = bookingModel::getByID($id);
        require("views/user.phtml");
    }

}
?>