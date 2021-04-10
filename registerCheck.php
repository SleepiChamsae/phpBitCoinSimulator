<?php
    try
    {
    $id = $_POST["id"];
    $pw = $_POST["pw"];
    $name = $_POST["name"];
    }
    catch(Exception $e)
    {
        echo "error occured : ".$e;
    }

    $conn = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($conn, 'game');
    
    checkUserExist($id);

    //TODO: 패스워드 해쉬값으로 바꾸기

    $querry = "INSERT INTO USER VALUES('$id','$pw','$name')";
    $result = mysqli_query($conn, $querry);

    if(!$result)
    {
        echo "회원 가입 실패!";
        //TODO: 조금 더 세부화하기
    }
    else
    {
        echo "회원 가입 성공!";
        echo "<script>location.replace('registerComplete')</script>";
    }

    function checkUserExist($id)
    {
        $querry = "SELECT ID FROM USER WHERE ID='$id'";
        $result = mysqli_query($GLOBALS['conn'], $querry);
        $resultRow = mysqli_fetch_row($result);
        if($resultRow[0] != null)
        {
            //에러 메세지를 출력
            echo "이미 있는 id입니다.";
            exit();
        }

    }
?>
    