<?php

define("MOD", 998244353);
[$N, $K] = ints();
for ($i = 0; $i < $K; ++$i) {
    [$L[], $R[]] = ints();
}
array_multisort($L, SORT_ASC, $R);
$s = array_fill(1, $N, 0);
$s[1] = 1;
$s[2] = -1;
$cnt = 0;
for ($d = 1; $d <= $N; ++$d) {
    $cnt += $s[$d] + MOD;
    $cnt %= MOD;
    if ($cnt < 1) {
        continue;
    }

    for ($i = 0; $i < $K; ++$i) {
        if ($d + $L[$i] > $N) {
            break;
        }
        $s[$d + $L[$i]] += $cnt;
        $s[$d + $L[$i]] %= MOD;
        if ($d + $R[$i] + 1 <= $N) {
            $s[$d + $R[$i] + 1] -= $cnt;
            $s[$d + $R[$i] + 1] %= MOD;
        }
    }
}
echo $cnt . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
