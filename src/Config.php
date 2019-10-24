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
    protected $timeout;
    protected $coroutineNum;
    protected $requestMaxNum;


}