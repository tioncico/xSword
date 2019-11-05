<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2019/10/24 0024
 * Time: 14:30
 */
include "./vendor/autoload.php";

go(function (){
    $xsword = new \XSword\XSword(new \XSword\Config());

    $xsword->exec(function (){
        $client = new \EasySwoole\HttpClient\HttpClient('http://www.x.cn');
        $data = $client->get();
        return $data->getStatusCode();
    });



});
