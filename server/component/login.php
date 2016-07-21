<?php
//测试{
//"actionFlag":6,
//"username":"fuck"
//"passwd":"you"
//}
//test finish


function login($json) {
    require_once "C:\\jianguoyun\\lffOJ\\server\\lib\\medoo.php";
    $database = new medoo([
        // 必须配置项
        'database_type' => 'mysql',
        'database_name' => 'lffoj',
        'server' => 'localhost',
        'username' => 'root',
        'password' => 'fuck',
        'charset' => 'utf8',

        // 可选参数
        'port' => 3306,
    ]);


    $jsonArr = json_decode($json, true);
    $email = $jsonArr['Email'];
    $passwd = $jsonArr['userPass'];

    $rows=$database->select("users","*",["Email"=>$email]);

    if($rows == null) {
        $arr = array(
            "status" => 'error',
            "content" => 'no account'
        );
        $jsonarr = json_encode($arr);
        return $jsonarr;
    }
    else if($passwd == $rows[0]) {
            $arr = array(
                "status" => 'success',
                "content" => ''
            );
            $jsonarr = json_encode($arr);
            return $jsonarr;
        }
    else if($passwd != $rows[0]){
        echo $passwd . '    ' . $rows[0]['Password'];
        $arr = array(
            "status" => 'error',
            "content" => 'fuck'
        );
        $jsonarr = json_encode($arr);
        return $jsonarr;
    }
    else {
        $arr = array(
            "status" => 'error',
            "content" => '未知错误'
        );
        $jsonarr = json_encode($arr);
        return $jsonarr;
    }
}