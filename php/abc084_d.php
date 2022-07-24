<?php

list($q) = ints();
$n = pow(10, 5);
$isPrime = isPrimeArr($n);
$cusum[1] = 0;
for ($i = 1; $i <= $n; $i++) {
    if ($i % 2 === 0) {
        $cusum[$i + 1] = $cusum[$i];
        continue;
    }
    if ($isPrime[$i] && $isPrime[intdiv($i + 1, 2)]) {
        $cusum[$i + 1] = $cusum[$i] + 1;
    } else {
        $cusum[$i + 1] = $cusum[$i];
    }
}
for ($i = 0; $i < $q; $i++) {
    list($l, $r) = ints();
    $ans[] = $cusum[$r + 1] - $cusum[$l];
}
echo implode(PHP_EOL, $ans);

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

function isPrimeArr($max)
{
    $arr = array_fill(0, $max + 1, true);
    $arr[0]  = $arr[1] = false;
    $rmax = (int) floor(sqrt($max));
    for ($i = 2; $i <= $rmax; $i++) {
        for ($j = 2 * $i; $j <= $max; $j += $i) {
            $arr[$j] = false;
        }
    }
    return $arr;
}
