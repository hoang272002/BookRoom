<?php
$controller = new loginController();
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $formAction = isset($_POST['formAction']) ? $_POST['formAction'] : '';

    switch ($formAction){
        case "signIn":
            $controller->checkUser();
        default:
            echo 'Unknown form action';
            break;
    }
}
else{
    $controller->index();
}


?>