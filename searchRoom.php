<?php
$controller = new searchRoomController();


if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $formAction = isset($_POST['formAction']) ? $_POST['formAction'] : '';

    switch ($formAction){
        case "searchRoom":
            $controller->getAvaiRoom();
            break;
        default:
            echo 'Unknown form action';
            break;
    }
}
else{
    $controller->index();
}

?>