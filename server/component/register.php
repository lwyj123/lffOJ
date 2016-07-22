<?php
//测试{
//"function":"Register",
//"Email":"443474713@qq.com",
//"userPass":"fuckjava",
//"nickName": "JavaFucker"
//}

function register($json) {
    require_once __DIR__ ."\\..\\lib\\medoo.php";
        $database = new medoo([
        // 必须配置项
        'database_type' => 'mysql',
        'database_name' => 'lffOJ',
        'server' => 'localhost',
        'username' => 'root',
        'password' => 'fuck',
        'charset' => 'utf8',

        // 可选参数
        'port' => 3306,
    ]);
    $res = array();
    $res['status'] = 'success';
    $res['content'] = '';

    $jsonArr = json_decode($json, true);
    $Email = $jsonArr['Email'];
    $userPass = $jsonArr['userPass'];
    $nickName = $jsonArr['nickName'];
    if ($Email == null)
    {
    	$res['status'] = 'error';
        $res['content'] = 'Must have an E-mail';
        return json_encode($res);
    }
    if ($nickName == null)
    {
    	$res['status'] = 'error';
        $res['content'] = 'Must have a nick';
        return json_encode($res);
    }
    $insert1 = $database -> insert("users",[
        "Email" => $Email,
        "Password" => $userPass,
        "nickname" => $nickName
    	]);
    
    return json_encode($res);
}
