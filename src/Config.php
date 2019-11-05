<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2019/10/24 0024
 * Time: 16:22
 */

namespace XSword;


use EasySwoole\Spl\SplBean;

class Config extends SplBean
{
    //超时时间
    protected $timeout=1*1000;
    //协程数
    protected $coroutineNum=100;
    //最大并发数
    protected $requestMaxNum=10000;
    //qps
    protected $qps=100;
    //请求时间
    protected $requestTime=60*60*1;
    //请求类型
    protected $requestType = self::TYPE_ONCE;

    const TYPE_ONCE=1;//一次性测试
    const TYPE_CONTINUED=2;//持续压力测试

    /**
     * @return float|int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param float|int $timeout
     */
    public function setTimeout($timeout): void
    {
        $this->timeout = $timeout;
    }

    /**
     * @return int
     */
    public function getCoroutineNum(): int
    {
        return $this->coroutineNum;
    }

    /**
     * @param int $coroutineNum
     */
    public function setCoroutineNum(int $coroutineNum): void
    {
        $this->coroutineNum = $coroutineNum;
    }

    /**
     * @return int
     */
    public function getRequestMaxNum(): int
    {
        return $this->requestMaxNum;
    }

    /**
     * @param int $requestMaxNum
     */
    public function setRequestMaxNum(int $requestMaxNum): void
    {
        $this->requestMaxNum = $requestMaxNum;
    }

    /**
     * @return int
     */
    public function getQps(): int
    {
        return $this->qps;
    }

    /**
     * @param int $qps
     */
    public function setQps(int $qps): void
    {
        $this->qps = $qps;
    }

    /**
     * @return float|int
     */
    public function getRequestTime()
    {
        return $this->requestTime;
    }

    /**
     * @param float|int $requestTime
     */
    public function setRequestTime($requestTime): void
    {
        $this->requestTime = $requestTime;
    }

    /**
     * @return int
     */
    public function getRequestType(): int
    {
        return $this->requestType;
    }

    /**
     * @param int $requestType
     */
    public function setRequestType(int $requestType): void
    {
        $this->requestType = $requestType;
    }

}