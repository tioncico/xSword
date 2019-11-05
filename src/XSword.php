<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2019/10/24 0024
 * Time: 14:47
 */

namespace XSword;

class XSword
{
    protected $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }


    function exec(callable $callback)
    {
        switch ($this->config->getRequestType()) {
            case Config::TYPE_ONCE:
                $result = $this->request($callback);
                break;
        }

    }

    function request(callable $callback)
    {
        $requestMaxNum = $this->config->getRequestMaxNum();
        $coroutineNum = $this->config->getCoroutineNum();
        $i = $requestMaxNum;
        while ($i >= 0) {
            $csp = new \EasySwoole\Component\Csp();
            for ($j = 0; $j < $coroutineNum; $j++) {
                $csp->add("request" . $j, function () use ($callback) {
                    \co::sleep(0.001);
                    return call_user_func($callback);
                });
                $i--;
            }
            $result = $csp->exec();
        }
        return $result;
    }
}