<?php
echo gcd(45, 27) . PHP_EOL;
echo lcm(45, 27) . PHP_EOL;

// 最大公約数（2つ）
function gcd($m, $n)
{
    if (!$n) return $m;
    return gcd($n, $m % $n);
}

// 最大公約数（3つ以上）
function gcdAll($arr)
{
    $gcd = array_pop($arr);
    foreach ($arr as $a) {
        $gcd = gcd($gcd, $a);
    }
    return $gcd;
}

// 最小公倍数（2つ）
function lcm($m, $n)
{
    return $m * $n / gcd($m, $n);
}

// 最小公倍数（3つ以上）
function lcmAll($arr)
{
    $lcm = array_pop($arr);
    foreach ($arr as $a) {
        $lcm = lcm($lcm, $a);
    }
    return $lcm;
}
