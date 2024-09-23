
<?php
class searchRoomController{
    public function index()
    {
        $VIEW = "views/searchRoom.phtml";
        require("template/template.phtml");
    }

    public function getAvaiRoom(){
        if(isset($_POST["btnSearch"])){
            $rooms = roomModel::getAvailableRoom($_POST["capacity"], $_POST["return_time"], $_POST["borrow_time"]);
            $borrow_time = $_POST["borrow_time"];
            $return_time = $_POST["return_time"];
            $VIEW = "views/searchRoom.phtml";
            require("template/template.phtml");
        }
    }

    public function addToCart() {
        $roomId = $_GET['roomId'];
        $borrowDate = $_GET['borrowDate'];
        $returnDate = $_GET['returnDate'];
    

        session_start();

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
    
        $roomExists = false;
        foreach ($_SESSION['cart'] as $item) {
            if ($item['roomId'] == $roomId) {
                $roomExists = true;
                break;
            }
        }
    
        if (!$roomExists) {
       
            $roomDetails = array(
                'roomId' => $roomId,
                'borrowDate' => $borrowDate,
                'returnDate' => $returnDate
            );
            
            $_SESSION['cart'][] = $roomDetails;
        }
    
  
        header('Location: index.php?action=searchRoom');
    }
    

}

?>