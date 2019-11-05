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


    function exec(ClientRequestAbstract $request)
    {
        switch ($this->config->getRequestType()) {
            case Config::TYPE_ONCE:
                $result = $this->once($request);
//                var_dump($result);
                break;
            case Config::TYPE_CONTINUED:
                $this->continued($request);
//                var_dump($result);
                break;
        }
    }

    function once(ClientRequestAbstract $request)
    {
        $requestMaxNum = $this->config->getRequestMaxNum();
        $coroutineNum = $this->config->getCoroutineNum();
        $i = $requestMaxNum;
        $totalResult = [];
        while ($i > 0) {
            $csp = new \EasySwoole\Component\Csp();
            for ($j = 0; $j < $coroutineNum; $j++) {
                $csp->add("request" . $j, function () use ($request) {
                    \co::sleep(0.001);
                    return $request->exec();
                });
                $i--;
            }
            $result = $csp->exec();
            $totalResult = array_merge($totalResult,array_values($result));
        }
        return $totalResult;
    }

    function continued(ClientRequestAbstract $request){
        $coroutineNum = $this->config->getCoroutineNum();
        $maxTime = $this->config->getRequestTime();

        $startTime = $this->microTimeFloat();
        $lastQueryTime=0;
        $totalResult = [];
        while(1){
            if ($startTime+$maxTime*1000<$this->microTimeFloat()){
                echo "success";
                break;
            }

            $csp = new \EasySwoole\Component\Csp();
            for ($j = 0; $j < $coroutineNum; $j++) {
                $csp->add("request" . $j, function () use ($request) {
                    \co::sleep(0.001);
                    return $request->exec()->toArray();
                });
            }
            $result = $csp->exec();
            $totalResult = array_merge($totalResult,array_values($result));
            $time = $this->microTimeFloat();
            if ($time-$lastQueryTime>=1000){
                $lastQueryTime=$time;
                $handel = new ContinuedResultHandel($totalResult);
                $handel->handel();
                $totalResult=[];
            }
        }
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