<?php
list($n) = ints();
$s = (string) $n;
$l = strlen($s);
// dp[l][smaller][cnt]: l 桁目までで N 以下が確定/未確定（ smaller ）の 1 を cnt 個含む数の個数
$dp[0][0][0] = 1;
for ($i = 1; $i <= $l; ++$i) {
    $n = (int)$s[$i - 1];
    foreach ([0, 1] as $smaller) {
        for ($x = 0; $x <= ($smaller ? 9 : $n); ++$x) {
            for ($cnt = 0; $cnt <= $i; ++$cnt) {
                $dp[$i][$smaller || $x < $n][$cnt + ($x === 1)] += ($dp[$i - 1][$smaller][$cnt] ?? 0);
            }
        }
    }
}
$ans = 0;
for ($i = 0; $i <= $l; ++$i)
    $ans += $i * ($dp[$l][0][$i] + $dp[$l][1][$i]);
echo $ans, PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
