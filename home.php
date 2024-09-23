<?php
$controller = new homeController();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

}
else{
    $controller->index();
}


?>