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
    protected $queryTime;

    //执行并发请求的逻辑
    abstract function request(): Response;

    //并发之后处理的逻辑
    public function resultHandel(Response $response, float $queryTime)
    {
        $result = new Result();
        $result->setIsSuccess($response->getStatusCode() == 200 ? true : false);
        $result->setBodyLength(strlen($response->getBody()));
        $result->setResponseTime($queryTime);
        $result->setResponseBody($response->getBody());
        return $result;
    }

    public function exec()
    {
        $startTime = $this->microTimeFloat();
        $result = $this->request();
        $queryTime = $this->microTimeFloat() - $startTime;
        return $this->resultHandel($result, $queryTime);
    }

    /**
     * Simple function to replicate PHP 5 behaviour
     */
    function microTimeFloat()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec)*1000;
    }
}