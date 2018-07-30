<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 18-7-30
 * Time: 上午10:05
 */

$redis = new swoole_redis();

$redis->connect('127.0.0.1', 6379, function (swoole_redis $client, $result) {
    if ($result === false) {
        echo "connect to redis server failed.\n";
        return;
    }
    $client->set('key', 'swoole', function (swoole_redis $client, $result) {
        var_dump($result);
    });
    $client->close();
});

echo 'hello world'.PHP_EOL;
