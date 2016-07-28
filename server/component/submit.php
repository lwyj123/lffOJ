<?php


require_once __DIR__.'\\..\\lib\\vendor\\autoload.php';
use Lcobucci\JWT\Parser;

function submit($json) {
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
    $res['submitStatus'] = 'Right(?)';


    $jsonArr = json_decode($json, true);
    $trainingId = $jsonArr['trainingId'];
    $token = $jsonArr['token'];

    $sourcePath = __DIR__ . "\\..\\..\\source\\" . 'excute.cpp';
    $excutePath = __DIR__ . "\\..\\..\\source\\" . 'fuck.exe';

    //评测部分
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $sourcePath);


    $command = 'E:\\Dev-Cpp\\MinGW64\\bin'.'\\g++ ' . $sourcePath .' -o '. $excutePath;
    $return = passthru($command);


    $now = 1;
    while(true) {


        $filename = __DIR__ .'\\..\\..\\testcase\\'. $trainingId . '\\' . $now .'.lfftest';
        $ansfilename = __DIR__ .'\\..\\..\\testcase\\'. $trainingId . '\\' . $now .'.lffans';
        if(file_exists($filename)) {
            $handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
            $contents = fread($handle, filesize ($filename));
            fclose($handle);  
        }
        else {
            break;
        }


        $command = $excutePath . ' ' . escapeshellcmd($contents);
        $return = exec($command);



        if(file_exists($ansfilename)) {
            $handle = fopen($ansfilename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
            $contents = fread($handle, filesize ($ansfilename));
            fclose($handle);  
        }
        else {
            break;
        }
        if($contents != $return) {
            $res['submitStatus'] = 'Wrong Answer';
            break;
        }
        $now += 1;
    
    }

    //for test

    $token = (new Parser())->parse((string) $token); // Parses from a string
    $token->getHeaders(); // Retrieves the token header
    $token->getClaims(); // Retrieves the token claims

    $insert1 = $database -> insert("submission",[
        "UserId" => $token->getClaim('Email'),
        "trainingId" => $trainingId,
        "STATUS" => $res['submitStatus'],
        ]);    

    return json_encode($res);
}