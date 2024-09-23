<?php
class homeController {
    public function index()
    {
        $result = roomModel::totalRoomAvailable();
        $dsRoom = $result->fetch_all(MYSQLI_ASSOC);
        $totalRoomavai = 0;
        $totalRoom = 0;

        if ($dsRoom) {
            // Ensure $dsRoom is an array before counting
            $totalRoom = count($dsRoom);
            foreach ($dsRoom as $row) {
                if ($row['status'] == "available") {
                    $totalRoomavai += 1;
                }
            }
        }

        $VIEW = "views/home.phtml";
        require("template/template.phtml");
    }
}
?>