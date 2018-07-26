<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 18-7-26
 * Time: 下午3:25
 */

$client = new swoole_client(SWOOLE_SOCK_TCP);
if (!$client->connect('127.0.0.1', 9501, -1))
{
    exit("connect failed. Error: {$client->errCode}\n");
}

$client->send(1);
$client->close();
