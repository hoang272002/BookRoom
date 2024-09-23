<?php
class updateRoomController {
    public function index($id)
    {
        $result = roomModel::getRoomByID($id);
        $room = $result->fetch_all(MYSQLI_ASSOC);
        $VIEW = "views/updateRoom.phtml";
        require("template/template.phtml");
    }

    public function updateRoom($id)
    {
        if (isset($_POST["btnUpdRoom"])){
           
            $room_name = $_POST['room_name'];
            $capacity = $_POST['capacity'];
            $block = $_POST['block'];
            $room_condition = $_POST['room_condition'];
            $type = $_POST['type'];
    
            $result = roomModel::updateRoom($id, $room_name, $capacity, $block, $room_condition, $type);
    
         
            if ($result) {
                session_start();
                $_SESSION['mess_success'] = "Cập nhật thành công!!!";
                header("Location: index.php?action=updateRoom&roomID=$id");
            } else {
                session_start();
                $_SESSION['mess_error'] = "Cập nhật thất bại!!!";
                header("Location: index.php?action=updateRoom&roomID=$id");
            }
        }
        header("Location: index.php?action=updateRoom&roomID=$id");
    }


}
?>