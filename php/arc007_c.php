<?php
// $n <= 10 と小さいので 0~n-1 分それぞれでテレビをつけるつけないの bit全探索を行う
list($c) = strs();
$n = strlen($c);
$min = PHP_INT_MAX;
for ($bit = 0; $bit < (1 << $n); ++$bit) {
    $time = 0;
    for ($i = 0; $i < $n; ++$i) {
        if (!($bit & (1 << $i))) continue;
        for ($j = 0; $j < $n; ++$j)
            if ($c[$j] === 'o') $time |= 1 << (($i + $j) % $n);
    }
    if ($time === ((1 << $n) - 1)) $min = min($min, popcount($bit));
}
echo $min, PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function popcount($x)
{
    $res = 0;
    while ($x > 0) {
        $x &= $x - 1;
        ++$res;
    }
    return $res;
}
