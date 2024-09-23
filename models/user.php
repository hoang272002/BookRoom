<?php
class userModel{
    function __construct() {
        $this->user_id = "";
        $this->username = "";
        $this->password = "";
        $this->email = "";
        $this->status = "";
        $this->user_type = "";
    }

    public static function checkUser($name, $pass) {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM users where username = '$name' and password = '$pass'";
        $result = $mysqli->query($query);
        $DS = array();
        

        if ($result){
            foreach ($result as $row){
                $userInfor = new userModel();
                $userInfor->user_id = $row["user_id"];
                $userInfor->username = $row["username"];
          
                $userInfor->password = $row["password"];
                $userInfor->email = $row["email"];
                $userInfor->status = $row["status"];
                $userInfor->user_type = $row["user_type"];
                $DS[] = $userInfor;
            }
        }

        $mysqli->close();
        return $DS;
    }
}
?>