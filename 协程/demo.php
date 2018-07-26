<?php

$n = 100;
for ($i = 0; $i < $n; $i++) {
    sleep(1);
    echo microtime(true) . ": hello $i \n";
};
echo "hello main \n";