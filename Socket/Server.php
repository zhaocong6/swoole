<?php

set_time_limit(0);

$ip = '127.0.0.1';
$port = 9051;

//创建一个socket资源, AF_INET=>IPV4, SOCK_STREAM数据流, SOL_TCP tcp
$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

//绑定ip和端口
$ret = socket_bind($sock, $ip, $port);

//监听
$ret = socket_listen($sock, 4);

//
while (true){

    //创建一个新的socket链接, 处理client端数据
    $msgsock = socket_accept($sock);

    //向client投递数据
    $msg = "连接成功\n";
    socket_write($msgsock, $msg, strlen($msg));

    //关闭链接
    socket_close($msgsock);
}
