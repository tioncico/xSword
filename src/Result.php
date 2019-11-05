<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2019/11/5 0005
 * Time: 9:39
 */

namespace XSword;


use EasySwoole\Spl\SplBean;

class Result extends SplBean
{
    //文档长度
    protected $bodyLength;
    //请求是否成功
    protected $isSuccess=true;
    //请求时间
    protected $responseTime;

    protected $responseBody;

    /**
     * @return mixed
     */
    public function getBodyLength()
    {
        return $this->bodyLength;
    }

    /**
     * @param mixed $bodyLength
     */
    public function setBodyLength($bodyLength): void
    {
        $this->bodyLength = $bodyLength;
    }

    /**
     * @return mixed
     */
    public function getIsSuccess()
    {
        return $this->isSuccess;
    }

    /**
     * @param mixed $isSuccess
     */
    public function setIsSuccess($isSuccess): void
    {
        $this->isSuccess = $isSuccess;
    }

    /**
     * @return mixed
     */
    public function getResponseTime()
    {
        return $this->responseTime;
    }

    /**
     * @param mixed $responseTime
     */
    public function setResponseTime($responseTime): void
    {
        $this->responseTime = $responseTime;
    }

    /**
     * @return mixed
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }

    /**
     * @param mixed $responseBody
     */
    public function setResponseBody($responseBody): void
    {
        $this->responseBody = $responseBody;
    }



}