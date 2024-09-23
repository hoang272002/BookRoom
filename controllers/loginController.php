
<?php
class loginController{
    public function index()
    {
      
        require("views/login.phtml");
    }

    public function checkUser(){
        if(isset($_POST["btnLogin"])){
            $userInfor = userModel::checkUser($_POST["username"], $_POST["password"]);

            if (count($userInfor) > 0) {
                session_start();
                $_SESSION['user'] = $userInfor[0];
                $_SESSION['mess_success'] = 'Hi ' . $_SESSION['username']->name . ', you logged in successfully!!';
                header("Location: index.php");
                exit;
            }
            else{
                session_start();
                $_SESSION['mess_error'] = "Username or password is incorrect!!!";
                header("Location: index.php?action=login");
                exit;
            }
        }
    }
}

?>