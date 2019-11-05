<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2019/11/5 0005
 * Time: 14:44
 */

class TestRequest extends \XSword\ClientRequestAbstract
{
    function request(): \EasySwoole\HttpClient\Bean\Response
    {
        $client = new \EasySwoole\HttpClient\HttpClient();
        $client->setUrl('http://x.cn');
        return $client->get();
    }
}