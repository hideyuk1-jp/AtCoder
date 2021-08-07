<?php
const MOD = 10 ** 9 + 7;
[$S] = strs();
$dp = array_fill(0, 9, 0);
$dp[0] = 1;
for ($i = 0; $i < strlen($S); ++$i) {
    $pos = strpos('chokudai', $S[$i]);
    if ($pos === false) continue;
    $dp[$pos + 1] += $dp[$pos];
    $dp[$pos + 1] %= MOD;
}
echo $dp[8];
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
