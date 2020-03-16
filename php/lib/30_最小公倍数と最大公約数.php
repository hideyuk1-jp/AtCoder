<?php
echo gcd(45, 27).PHP_EOL;
echo lcm(45, 27).PHP_EOL;

// 最大公約数
function gcd($m, $n){
    if($n > $m) list($m, $n) = [$n, $m];

    if ($m % $n === 0) return $n;
    else return gcd($n, $m % $n);
}

// 最小公倍数
function lcm($m, $n){
    return $m * $n / gcd($m, $n);
}