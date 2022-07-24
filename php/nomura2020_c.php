<?php

list($n) = ints();
$reaf = ints();
$next_max_node = 1;
$cnt = 0;
$cusum[-1] = 0;
for ($i = 0; $i <= $n; ++$i) {
    $cusum[$i] += $cusum[$i - 1] + $reaf[$i];
}
for ($i = 0; $i <= $n; ++$i) {
    if ($next_max_node < $reaf[$i]) {
        exit('-1');
    }
    $not_reaf[$i] = $i < $n ? $next_max_node - $reaf[$i] : 0;
    $cnt += $reaf[$i] + $not_reaf[$i];
    $next_max_node = min($not_reaf[$i] * 2, $cusum[$n] - $cusum[$i]);
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
