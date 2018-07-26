<?php

$n = 5;
go(function () use ($n) {
    for ($i = 0; $i < $n; $i++) {
        Co::sleep(1);
        echo microtime(true) . ": hello $i \n";
    };
});
echo "hello main \n";
