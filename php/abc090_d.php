<?php
list($n, $k) = ints();
$ans = 0;
for ($b = $k + 1; $b <= $n; $b++) {
    $ans += intdiv($n, $b) * ($b - $k);
    $ans += max(0, $n % $b - $k + 1);
}
if ($k === 0) $ans -= $n - $k; // a=0の場合を除外
echo $ans;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
