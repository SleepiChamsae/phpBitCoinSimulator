<?php

namespace application\models;
use \PDO;

class UserModel extends Model
{
    public function checkLogin()
    {
        $id = $_POST['ID'];
        $pw = $_POST['PW'];

        if(!$this->checkPostNull(['ID', 'PW']))
        {
            echo "<script>
                alret('아이디 혹은 비밀번호를 입력하지 않았습니다');
            </script>";
        }

        return $this->checkUserPassword($id, $pw);
    }

    private function checkUserPassword($id, $pw)
    {
        $sql = "SELECT * FROM user WHERE ID=:id AND PW=:pw";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':pw', $pw);
        
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if(empty($result)) {
            return false;
        }

        return true;
    }

    private function LoginFailed() 
    {

    }
}