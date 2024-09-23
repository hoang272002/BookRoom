<?php
$controller = new updateRoomController();
$roomid = "";
if (isset($_GET["roomID"]))
{
    $roomid = $_GET["roomID"];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $formAction = isset($_POST['formAction']) ? $_POST['formAction'] : '';

    switch ($formAction){
        case "updateRoom":
            $controller->updateRoom($roomid);
        default:
            echo 'Unknown form action';
            break;
    }
}
else{
    $controller->index($roomid);
}


?>