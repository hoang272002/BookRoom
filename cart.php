<?php
$controller = new cartController();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $formAction = isset($_POST['formAction']) ? $_POST['formAction'] : '';

    switch ($formAction){
        case "addBooking":
            $controller->insert();
        default:
            echo 'Unknown form action';
            break;
    }
}
else{
    $controller->index();
}


?>