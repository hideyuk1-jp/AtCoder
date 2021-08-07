<?php
const MOD = 10 ** 9 + 7;
[$S] = strs();
$dp[0][''] = 1;
for ($i = 0; $i < strlen($S); ++$i) {
    $dp[$i + 1] = $dp[$i];
    $pos = strpos('chokudai', $S[$i]);
    if ($pos === false) continue;
    $c = substr('chokudai', 0, $pos);
    $dp[$i + 1][$c . $S[$i]] = ($dp[$i + 1][$c . $S[$i]] ?? 0) + ($dp[$i][$c] ?? 0);
    $dp[$i + 1][$c . $S[$i]] = $dp[$i + 1][$c . $S[$i]] % MOD;
}
echo $dp[strlen($S)]['chokudai'] ?? 0;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
