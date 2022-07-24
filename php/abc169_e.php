<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a[], $b[]) = ints();
}
sort($a);
sort($b);
if ($n % 2) { // nが奇数
    $M = $b[intdiv($n, 2)]; // bの中央値
    $m = $a[intdiv($n, 2)]; // aの中央値
    echo $M - $m + 1; // m~Mで１刻み
} else { // nが偶数
    $M = ($b[intdiv($n, 2) - 1] + $b[intdiv($n, 2)]) / 2; // bの中央値
    $m = ($a[intdiv($n, 2) - 1] + $a[intdiv($n, 2)]) / 2; // aの中央値
    echo($M - $m) * 2 + 1; // m~Mで0.5刻み
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
