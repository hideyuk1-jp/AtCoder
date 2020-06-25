<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($s[$i]) = strs();
    $s[$i] = strrev($s[$i]);
}
natsort($s);
foreach ($s as $v) echo strrev($v) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
