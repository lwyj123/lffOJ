<?php
//测试{
//"function":Login,
//"Email":"443474713@qq.com",
//"userPass":"fuckjava"
//}
require_once __DIR__.'\\..\\lib\\vendor\\autoload.php';
use Lcobucci\JWT\Builder;

function login($json) {
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

    if($Email == null|| $userPass == null) {
        $res['status'] = 'error';
        $res['content'] = 'areyoukiddingme';
        return json_encode($res);
    }

    $datas = $database->select("Users", [
        "Email",
        "Password"
    ], [
        "AND" => [
            "Email" => $Email,
            "Password" => $userPass
        ]
    ]);

    if($datas == null) {
        $res['status'] = 'error';
        $res['content'] = 'fack';
        return json_encode($res);
    }

    $token = (new Builder())->setId('4f1g23a12aa', true) // Configures the id (jti claim), replicating as a header item
                            ->setIssuedAt(time()) // Configures the time that the token was issue (iat claim)
                            ->setNotBefore(time()) // Configures the time that the token can be used (nbf claim)
                            ->setExpiration(time() + 3600) // Configures the expiration time of the token (nbf claim)
                            ->set('Email', '443474713@qq.com') // Configures a new claim, called "uid"
                            ->getToken(); // Retrieves the generated token

    $res['content'] = (string)$token;

    return json_encode($res);
}