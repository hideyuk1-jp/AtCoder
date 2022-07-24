<?php

[$N, $S] = strs();
$N = (int)$N;
$sum = ["A" => 0, "T" => 0, "C" => 0, "G" => 0];
$t[0][0] = 1;
for ($i = 0; $i < $N; ++$i) {
    ++$sum[$S[$i]];
    $n1 = $sum["A"] - $sum["T"];
    $n2 = $sum["C"] - $sum["G"];
    if (!isset($t[$n1][$n2])) {
        $t[$n1][$n2] = 0;
    }
    ++$t[$n1][$n2];
}
$cnt = 0;
foreach ($t as $i => $a) {
    foreach ($a as $j => $v) {
        $cnt += ($v - 1) * $v / 2;
    }
}
echo $cnt;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
