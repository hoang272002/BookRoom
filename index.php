<?php
require_once("controllers/homeController.php");
require_once("controllers/loginController.php");
require_once("controllers/updateRoomController.php");
require_once("controllers/searchRoomController.php");
require_once("controllers/cartController.php");
require_once("controllers/adminController.php");
require_once("controllers/chitietController.php");
require_once("controllers/userController.php");

require_once("models/user.php");
require_once("models/room.php");
require_once("models/booking.php");
require_once("models/bookingDetail.php");

require_once("database/connection.php");
$action = "";
if (isset($_GET["action"]))
{
    $action = $_GET["action"];
}
$type = "";
if (isset($_GET["type"]))
{
    $type = $_GET["type"];
}

if(isset($_GET["roomId"]) && isset($_GET["borrowDate"]) && isset($_GET["returnDate"])){
    $controller = new searchRoomController();
    $controller->addToCart();
}
else if($type == "admin" && isset($_GET["userid"])){
    $controller = new adminController();
    $controller->index();
}
else if($type == "member" && isset($_GET["userid"])){
    $controller = new userController();
    $controller->index($_GET["userid"]);
}
else if($action == "chitiet" & isset($_GET["bookid"])){
    $controller = new chitietController();
    $controller->index($_GET["bookid"]);
}
else{
    switch ($action){
        case "logout":
            session_start();
            $_SESSION = array();
            session_destroy();
            header("Location: index.php");
            break;
        case "cart":
            require_once("cart.php");
            break;
        case "cart":
            require_once("cart.php");
            break;
        case "searchRoom":
            require_once("searchRoom.php");
            break;
        case "updateRoom":
            require_once("updateRoom.php");
            break;
        case "login":
            require_once("login.php");
            break;
        default:
            require_once("home.php");
            break;
    }

}

?>