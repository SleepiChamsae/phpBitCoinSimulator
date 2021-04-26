<?php
namespace application\models;

use Exception;
use \PDO;

class Model
{
    public $pdo;

    public function __construct()
    {
        $dsn = _DBTYPE.':host='._HOST.';dbname='._DBNAME.';charset='._CHARSET;

        try {
            $this->pdo = new PDO($dsn, _DBUSER, _DBPASSWORD);

            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            var_dump("DB접속 중에 에러가 발생하셨습니다.:".$e->getMessage());
        }
    }

    protected static function checkPostNull($list)
    {
        //코드 상 문제는 없는데 실수로 대소문자 잘못 넣으면 오류나는 문제 있음.
        foreach($list as $i) {
            if(!isset($_POST[$i]))
            {
                return false;
            }
        }
        return true;

    }

    protected static function checkGetNull($list)
    {
        foreach($list as $i) {
            if(!isset($_GET[$i]))
            {
                return false;
            }
        }
        return true;
    }
}