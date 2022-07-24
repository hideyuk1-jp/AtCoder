<?php

list($n) = ints();
$nums = ['1', '2', '3', '4', '5', '6', '7', '8', '9'];
$zoro = [];
$i = 1;
while (count($zoro) < $n) {
    foreach ($nums as $num) {
        $zoro[] = str_repeat($num, $i);
    }
    ++$i;
}
echo $zoro[$n - 1] . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
