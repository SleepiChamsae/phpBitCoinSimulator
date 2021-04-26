<?php

namespace application\controllers;


class UserController extends Controller
{
    public function login()
    {
        $model = new \application\models\UserModel();
        if($model->checkLogin()) {
            session_start();
            $_SESSION['LoggedIn'] = true;
            $_SESSION['id'] = $_POST['ID'];
            echo "로그인 성공!";
        } else {
            echo "<script>
                    alert('로그인 실패!');
                    history.back();
                </script>";
        }
        require_once("application/views/user/login.php");
    }

    public function logout()
    {
        session_destroy();
        require_once("application/views/board/index.php");
    }
}
?>