<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2019/11/5 0005
 * Time: 9:32
 */

namespace XSword;


use EasySwoole\HttpClient\Bean\Response;

abstract class ClientRequestAbstract
{
    //执行并发请求的逻辑
    abstract function request(): Response;

    //并发之后处理的逻辑
    public function resultHandel(Response $response)
    {
        $result = new Result();

        $result->setIsSuccess($response->getStatusCode()==200?true:false);
//        $result->setDocumentLength($response->);


    }

    public function exec()
    {
        $result = $this->request();
        return $this->resultHandel($result);
    }
}