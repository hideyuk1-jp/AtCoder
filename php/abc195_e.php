<?php
[$N] = ints();
[$S] = strs();
[$X] = strs();
$S = strrev($S);
$X = strrev($X);
$dp = array_fill(0, $N + 1, array_fill(0, 7, false));
$dp[0][0] = true;
$d = 1;
for ($i = 0; $i < $N; ++$i) {
    $num = (intval($S[$i]) * $d) % 7;
    for ($k = 0; $k < 7; ++$k) {
        if ($X[$i] === 'T') $dp[$i + 1][$k] = $dp[$i][$k] || $dp[$i][($k + 7 - $num) % 7];
        else $dp[$i + 1][$k] = $dp[$i][$k] && $dp[$i][($k + 7 - $num) % 7];
    }
    $d *= 10;
    $d %= 7;
}
echo $dp[$N][0] ? 'Takahashi' : 'Aoki';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
