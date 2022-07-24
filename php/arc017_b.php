<?php

list($n, $k) = ints();
$p = PHP_INT_MIN;
$cnt = $ans = 0;
for ($i = 0; $i < $n; ++$i) {
    list($a) = ints();
    if ($a > $p) {
        ++$cnt;
    } else {
        if ($cnt >= $k) {
            $ans += $cnt - $k + 1;
        }
        $cnt = 1;
    }
    $p = $a;
}
if ($cnt >= $k) {
    $ans += $cnt - $k + 1;
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
