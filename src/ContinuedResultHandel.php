<?php
/**
 * Created by PhpStorm.
 * User: Tioncico
 * Date: 2019/11/5 0005
 * Time: 14:56
 */

namespace XSword;


class ContinuedResultHandel
{
    protected $resultList;

    function __construct(array $result)
    {
        $this->resultList = $result;
    }

    function handel()
    {
        $resultList = $this->resultList;


        $resultCount = count($resultList);
        //根据字段last_name对数组$data进行降序排列
        $responseTimeArr = array_column($resultList,'responseTime');
        array_multisort($responseTimeArr,SORT_ASC,$resultList);

        $minResponseTime = $resultList[0]['responseTime'];
        $maxResponseTime = $resultList[$resultCount-1]['responseTime'];
        $averageResponseTime = array_sum(array_column($resultList,'responseTime'))/$resultCount;

        echo "";
        echo "请求总数:{$resultCount} \n";
        echo "最快响应:{$minResponseTime} ms \n";
        echo "最慢响应:{$maxResponseTime} ms \n";
        echo "平均响应:{$averageResponseTime} ms \n";
        echo "10%:{$resultList[ceil($resultCount*0.1)]['responseTime']} \n";
        echo "30%:{$resultList[ceil($resultCount*0.3)]['responseTime']} \n";
        echo "50%:{$resultList[ceil($resultCount*0.5)]['responseTime']} \n";
        echo "80%:{$resultList[ceil($resultCount*0.8)]['responseTime']} \n";

    }

}