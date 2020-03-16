<?php
fscanf(STDIN, '%d %d', $a, $b);
$gcd = gcd($a, $b);
$prime_num = primeNumbers($gcd);
$arr = [];
foreach ($prime_num as $v) {
    if ($a % $v === 0 && $b % $v === 0) $arr[] = $v;
}
$ans = count($arr) + 1;
echo $ans.PHP_EOL;

/**
 * エラトステネスのふるい
 * $maxまでの整数が素数かどうかboolを格納した配列を返す
 */
function isPrime($max) {
    $arr = array_fill(0, $max + 1, true);
    $arr[0]  = $arr[1] = false;
    $rmax = floor(sqrt($max));
    for ($i = 2; $i <= $rmax; $i++) {
        for ($j = 2 * $i; $j <= $max; $j += $i) {
            $arr[$j] = false;
        }
    }
    return $arr;
}

function primeNumbers($max) {
    $arr = [];
    $is_prime = isPrime($max);
    for ($i = 2; $i <= $max; $i++) {
        if ($is_prime[$i]) $arr[] = $i;
    }
    return $arr;
}

// 最大公約数
function gcd($m, $n){
    if($n > $m) list($m, $n) = [$n, $m];
    if ($m % $n === 0) return $n;
    else return gcd($n, $m % $n);
}

exit();

fscanf(STDIN, '%d', $n);
$a = array_map('intval', explode(' ', trim(fgets(STDIN))));
$q = new SplPriorityQueue;
for ($i = 0; $i < $n; $i++) {
    $q->insert($i+1, -$a[$i]);
}
while ($q->count() > 0) {
    echo $q->extract().' ';
}

exit();

fscanf(STDIN, '%d %d', $n, $k);
$h = array_map('intval', explode(' ', trim(fgets(STDIN))));
$res = 0;
for ($i = 0; $i < $n; $i++) {
    if ($h[$i] >= $k) $res++;
}
echo $res.PHP_EOL;

exit();

fscanf(STDIN, '%d', $n);
$res = ceil($n / 2) / $n;
echo $res.PHP_EOL;