<?php
list($n, $k) = ints();
$a = ints();
if ($k % gcdAll($a) === 0 && $k <= max($a)) echo 'POSSIBLE';
else echo 'IMPOSSIBLE';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
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
    return (int) ($m / gcd($m, $n) * $n); // オーバーフローしないように先に割り算
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
