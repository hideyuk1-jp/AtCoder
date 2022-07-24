<?php

list($n, $t) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a[], $b[]) = ints();
}
array_multisort($a, SORT_ASC, $b);
// dp[i][t] = s
// i番目までの料理のうち、t未満で食べ切れる満足度の最大値s
$dp[0] = array_fill(0, $t + 1, 0);
for ($i = 0; $i < $n; ++$i) {
    for ($_t = 0; $_t <= $t; ++$_t) {
        if ($_t > $a[$i]) {
            $dp[$i + 1][$_t] = max($dp[$i][$_t - $a[$i]] + $b[$i], $dp[$i][$_t]);
        } else {
            $dp[$i + 1][$_t] = $dp[$i][$_t];
        }
    }
}
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    $ans = max($ans, $dp[$i][$t] + $b[$i]);
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
