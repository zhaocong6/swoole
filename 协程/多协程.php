<?php
$n = 5;
for ($i = 0; $i < $n; $i++) {
    go(function () use ($i) {
        Co::sleep(1);
        echo microtime(true) . ": hello $i \n";
    });
};
echo "hello main \n";

