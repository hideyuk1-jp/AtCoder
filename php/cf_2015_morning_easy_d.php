<?php
list($n) = ints();
list($s) = strs();
$min = $n;
// 分割位置を全探索
for ($i = 0; $i < $n - 1; ++$i) {
    $x = substr($s, 0, $i + 1);
    $y = substr($s, $i + 1);
    $lcs = lcs($x, $y);
    $min = min($min, $n - strlen($lcs) * 2);
}
echo $min . PHP_EOL;
// x と y の最長部分列を求める
function lcs($x, $y)
{
    $lx = strlen($x);
    $ly = strlen($y);
    $dp[0] = array_fill(0, $ly + 1, 0);
    for ($i = 1; $i <= $lx; ++$i) {
        $dp[$i][0] = 0;
        for ($j = 1; $j <= $ly; ++$j) {
            $same = $x[$i - 1] === $y[$j - 1] ? 1 : 0;
            $dp[$i][$j] = max($dp[$i - 1][$j - 1] + $same, $dp[$i - 1][$j], $dp[$i][$j - 1]);
        }
    }
    $lcs = '';
    $i = $lx;
    for ($j = $ly; $j >= 1; --$j)
        if ($dp[$i][$j] !== $dp[$i][$j - 1]) $lcs .= $y[$j - 1];
    return strrev($lcs);
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
