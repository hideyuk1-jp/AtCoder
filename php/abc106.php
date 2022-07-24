<?php

// D
fscanf(STDIN, '%d %d %d', $N, $M, $Q);
$l = array_fill(0, $N, array_fill(0, $N, 0));
for ($i  = 0; $i < $M; $i++) {
    fscanf(STDIN, '%d %d', $L, $R);
    $L--;
    $R--;
    $l[$L][$R - $L]++;
}
for ($i = 0; $i < $N; $i++) {
    for ($j = 0; $j < $N; $j++) {
        $cusum[$i][$j] = $l[$i][$j] + $cusum[$i][$j - 1] ?? 0;
    }
}
for ($i  = 0; $i < $Q; $i++) {
    fscanf(STDIN, '%d %d', $p, $q);
    $p--;
    $q--;
    $d = $q - $p;
    $sum = $cusum[$p][$d];
    for ($j = 1; $j <= $d; $j++) {
        $sum += $cusum[$p + $j][$d - $j];
    }
    $ans[] = $sum;
}
echo implode(PHP_EOL, $ans);

exit;

// C
fscanf(STDIN, '%s', $s);
fscanf(STDIN, '%d', $k);
$N = 5 * (10 ** 12);
$n = strlen($s);
for ($i = 0; $i < $n; $i++) {
    $x = (int) $s[$i];
    if ($x ** $N >= $k) {
        $ans = $x;
        break;
    } else {
        $k -= $x ** $N;
    }
}
echo $ans;

exit;

// B
fscanf(STDIN, '%d', $n);
$ans = 0;
for ($i = 1; $i <= $n; $i += 2) {
    if (count(divisors($i)) === 8) {
        $ans++;
    }
}
echo $ans;

// 約数列挙
function divisors($max)
{
    $arr = [];
    $rmax = (int) floor(sqrt($max));
    for ($i = 1; $i <= $rmax; $i++) {
        if ($max % $i === 0) {
            $arr[] = $i;
            $arr[] = $max / $i;
        }
    }
    sort($arr);
    return array_unique($arr);
}

exit;

// A
fscanf(STDIN, '%d %d', $a, $b);
echo($a - 1) * ($b - 1);
