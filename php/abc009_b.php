<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a) = ints();
    $arr[$a] = true;
}
$arr = array_keys($arr);
rsort($arr);
echo $arr[1] . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
