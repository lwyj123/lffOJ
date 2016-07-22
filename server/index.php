<?php

// check for required fields
require_once __DIR__ . '/config.php';
//map
$map = ['Login' => "login",'Register' => "register"];


//for use
$json = json_encode($_POST);
$jsonArr = json_decode($json, true);


if (isset($jsonArr['function'])) {
    $function = $jsonArr['function'];
    echo $function;
    //use linux
    //$s = __DIR__. '/component/'.$map[$function].'.php';
    //include_once  __DIR__. 'component/'.$map[$function].'.php';

    //debug windows
    $s = __DIR__. '\component\\'.$map[$function].'.php';
    include_once  __DIR__. '\component\\'.$map[$function].'.php';
    


    //return call_user_func($map[$actionFlag]);
    echo call_user_func($map[$function], $json);
}
else {
    echo 99;
}


