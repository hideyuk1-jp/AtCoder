<?php
list($n, $m) = ints();
$a = ints();
// cnt[mod]: m で割った余りが mod になる累積和の個数
// 0 ~ l-1 と 0 ~ r で、合計を m で割った余りが同じ => l ~ r の合計は m の倍数
$cnt[0] = 1; // 何も選ばない場合
$ans = $sum = 0;
for ($i = 0; $i < $n; ++$i) {
    $sum += $a[$i];
    if (isset($cnt[$sum % $m])) ++$cnt[$sum % $m];
    else $cnt[$sum % $m] = 1;
}
foreach ($cnt as $c)
    $ans += $c * ($c - 1) / 2;
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
