<?php
list($n) = ints();
$cnt = [];
for ($i = 0; $i < $n; ++$i) {
    list($s) = ints();
    if ($s > 0) {
        if (isset($cnt[$s])) ++$cnt[$s];
        else $cnt[$s] = 1;
    }
}
krsort($cnt);
$sum = 0;
foreach ($cnt as $i => $v) {
    $cusum[] = [$i + 1, $sum];
    $sum += $v;
}
$cusum[] = [0, $sum];
$cn = count($cusum);
list($q) = ints();
for ($i = 0; $i < $q; ++$i) {
    list($k) = ints();

    $ok = -1;
    $ng =  $cn;
    while (abs($ok - $ng) > 1) {
        $mid = intdiv($ok + $ng, 2);
        if ($cusum[$mid][1] <= $k) {
            $ok = $mid;
            $oks = $cusum[$mid][0];
        } else {
            $ng = $mid;
        }
    }
    $ans[] = $oks;
}
echo implode(PHP_EOL, $ans) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
