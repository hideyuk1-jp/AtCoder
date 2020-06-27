<?php
list($n, $m, $k) = ints();
$a = ints();
$b = ints();
$cnta[0] = $cntb[0] = 0;
for ($i = 0; $i < $n; ++$i) $cnta[$i + 1] = $cnta[$i] + $a[$i];
for ($i = 0; $i < $m; ++$i) $cntb[$i + 1] = $cntb[$i] + $b[$i];

$max = 0;
for ($i = 0; $i <= $n; ++$i) {
    $t = $cnta[$i];
    if ($t > $k) break;
    elseif ($t === $k) $max = max($max, $i);

    $ok = -1;
    $ng = $m + 1;
    while (abs($ok - $ng) > 1) {
        $mid = intdiv($ok + $ng, 2);
        if ($t + $cntb[$mid] <= $k) $ok = $mid;
        else $ng = $mid;
    }
    if ($ok >= 0) $max = max($max, $i + $ok);
}
echo $max;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
