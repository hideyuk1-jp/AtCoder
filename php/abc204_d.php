<?php
[$N] = ints();
$a = ints();
$sum = array_sum($a);
$harf = $sum / 2;
$dp[0] = true;
for ($i = 0; $i < $N; ++$i) {
    foreach ($dp as $j => $_) {
        if ($j + $a[$i] > $harf) continue;
        $dp[$j + $a[$i]] = true;
    }
}
echo $sum - max(array_keys($dp));
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
