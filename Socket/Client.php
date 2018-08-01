<?php

set_time_limit(0);

$ip = '127.0.0.1';
$port = 9051;

//创建一个socket资源, AF_INET=>IPV4, SOCK_STREAM数据流, SOL_TCP tcp
$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

//连接server
$res = socket_connect($sock, $ip, $port);

//向server投递数据
socket_write($sock, 'hello server', 1024);

//取出server返回数据
$result = socket_read($sock, 1024);

echo '服务器返回数据:'.$result;

//关闭socket
socket_close($sock);