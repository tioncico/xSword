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
    protected $timeout = 3;

    function exec(callable $callback, $coroutineNum = 100, $requestMaxNum = 100)
    {

    }

    function request(callable $callback, $coroutineNum = 100, $requestMaxNum = 100)
    {
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