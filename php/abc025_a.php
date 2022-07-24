<?php

list($s) = strs();
list($n) = ints();
$s = $ss = str_split($s);
foreach ($s as $v1) {
    foreach ($ss as $v2) {
        $a = $v1 . $v2;
        --$n;
        if ($n === 0) {
            break 2;
        }
    }
}
echo $a . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
