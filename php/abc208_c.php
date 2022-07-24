<?php

[$n, $k] = ints();
$a = ints();
asort($a);
$ans = array_fill(0, $n, 0);
$cnt = 0;
foreach ($a as $i => $_) {
    $ans[$i] = intdiv($k, $n);
    if ($cnt < $k % $n) {
        $ans[$i]++;
    }
    $cnt++;
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
