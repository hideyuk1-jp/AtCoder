<?php

[$a, $b, $c] = ints();
$a %= 10;
$cnt = f($a);
if ($cnt === 1) {
    exit((string)$a);
}
$mod = $cnt;
$bc = modPow($b, $c);
$mod = 10;
echo modPow($a, $bc + $cnt);
function f($a)
{
    $x = $a;
    $visit = [];
    $visit[$x] = true;
    $cnt = 0;
    while (true) {
        $cnt++;
        $x *= $a;
        $x %= 10;
        if (isset($visit[$x])) {
            break;
        }
        $visit[$x] = true;
    }
    return $cnt;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
// 掛け算
function modMul($x, $y)
{
    global $mod;
    return ($x * $y) % $mod;
}
// 累乗（繰り返し二乗法）
function modPow($n, $x)
{
    global $mod;
    if ($x === 0) {
        return 1;
    }
    $res = (modPow($n, $x >> 1) ** 2) % $mod;
    if ($x % 2 === 1) {
        $res = modMul($res, $n);
    }
    return $res;
}
