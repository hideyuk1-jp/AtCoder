<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($a, $b) = ints();
    --$a;
    $task[$a][] = $b;
}
$sum = 0;
$q = new SplMaxHeap();
for ($i = 0; $i < $n; ++$i) {
    if (isset($task[$i])) {
        foreach ($task[$i] as $b) {
            $q->insert($b);
        }
    }
    $sum += $q->extract();
    $ans[] = $sum;
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
