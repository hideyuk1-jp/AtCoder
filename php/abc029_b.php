<?php

$ans = 0;
for ($i = 0; $i < 12; ++$i) {
    list($s) = strs();
    if (strpos($s, 'r') !== false) {
        $ans++;
    }
}
echo $ans . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
