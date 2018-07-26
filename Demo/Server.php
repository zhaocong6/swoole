<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 18-7-26
 * Time: 下午3:19
 */

class Server
{
    private $serv;

    public function __construct()
    {
        $this->serv = new swoole_server('0.0.0.0', 9501, SWOOLE_PROCESS, SWOOLE_SOCK_TCP);

        $this->serv->set([
            'reactor_num'   => 12,
            'worker_num'    => 16,
            'max_conn'      => 1000,
//            'dispatch_mode' => 1,
            'task_worker_num'=> 40,
//            'task_ipc_mode' =>  3,
        ]);

        $this->serv->on('start', function (swoole_server $server){
            echo 'swoole:server, 启动成功!'.PHP_EOL;
        });

        $this->serv->on('workerStart', function (swoole_server $server, $worker_id){
            if ($server->taskworker){
                echo 'swoole: server task'.PHP_EOL;
            }else{
                echo 'swoole: server worker'.PHP_EOL;
            }
        });

        $this->serv->on('task', function (){});
        $this->serv->on('finish', function ($serv, $task_id, $data) {});

        $this->serv->on('receive', function (swoole_server $server, $fd, $reactor_id, $data){
            echo '数据接受成功!'.PHP_EOL;
        });

        $this->serv->on('shutdown', function (){
            echo 'swoole:server, 服务关闭';
        });

        $this->serv->start();
    }
}

new Server();
