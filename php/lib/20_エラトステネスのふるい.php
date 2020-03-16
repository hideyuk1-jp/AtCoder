<?php
fscanf(STDIN, '%d', $max);
// 素数かどうか前処理
$ans = primeList($max);
echo implode(' ', $ans);

exit;

// abc84-d
fscanf(STDIN, '%d', $q);
for ($i  = 0; $i < $q; $i++) {
    fscanf(STDIN, '%d %d', $l[], $r[]);
}
$max = max($r);

// 素数かどうか前処理
$is_prime = isPrime($max);

// 累積和
$s = array_fill(0, $max, 0);
for ($i = 1; $i <= $max; $i++) {
    if ($is_prime[$i] && $is_prime[($i + 1) / 2]) {
        $s[$i] = $s[$i - 1] + 1;
    } else {
        $s[$i] = $s[$i - 1];
    }
}

for ($i = 0; $i < $q; $i++) {
    echo ($s[$r[$i]] - $s[$l[$i] - 1]) . PHP_EOL;
}

/**
 * エラトステネスのふるい
 * $maxまでの整数のうち素数のみを格納した配列を返す
 */
function primeList($max)
{
    $is_prime = isPrime($max);
    $res = [];
    for ($i = 1; $i <= $max; $i++) {
        if ($is_prime[$i]) $res[] = $i;
    }
    return $res;
}

/**
 * エラトステネスのふるい
 * $maxまでの整数が素数かどうかboolを格納した配列を返す
 */
function isPrime($max)
{
    $res = array_fill(0, $max + 1, true);
    $res[0] = $res[1] = false;
    $rmax = floor(sqrt($max));
    for ($i = 2; $i <= $rmax; $i++) {
        if (!$res[$i]) continue;
        for ($j = 2 * $i; $j <= $max; $j += $i) {
            $res[$j] = false;
        }
    }
    return $res;
}
