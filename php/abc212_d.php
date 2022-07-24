<?php

[$q] = ints();
$pq = new SplPriorityQueue();
$add = [];
$ans = [];
for ($i = 0; $i < $q; ++$i) {
    $query = ints();
    $add[$i] = $add[$i - 1] ?? 0;
    if ($query[0] === 1) {
        $pq->insert([$query[1], $i], -$query[1] + $add[$i]);
    } elseif ($query[0] === 2) {
        $add[$i] += $query[1];
    } else {
        [$num, $j] = $pq->extract();
        $ans[] = $num + $add[$i] - $add[$j];
    }
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
