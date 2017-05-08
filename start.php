<?php
/**
 * Created by PhpStorm.
 * User: xj
 * Date: 17-5-8
 * Time: 下午7:25
 */
use Workerman\Worker;
require_once 'Workerman/Autoloader.php';

//创建一个Worker监听2346端口，使用websocket协议通讯
$ws_worker=new Worker('websocket://0.0.0.0:2346');
//启动4噶进程对外提供服务
$ws_worker->count=4;
//当收到客户端发来的数据后返回hello$data
$ws_worker->onMessage=function ($connection,$data){
    $connection->send('hello '.$data);
};

//运行
Worker::runAll();