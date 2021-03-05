<?php
[$N] = ints();
$ans = 1;
for ($i = 2; $i <= $N; ++$i) {
    $ans = lcm($ans, $i);
}
++$ans;
echo $ans;
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
// 最小公倍数（2つ）
function lcm($m, $n)
{
    return (int) ($m / gcd($m, $n) * $n); // オーバーフローしないように先に割り算
}
