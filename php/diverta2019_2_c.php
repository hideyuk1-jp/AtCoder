<?php

list($n) = ints();
$a = ints();
sort($a);
for ($i = $n - 2; $i >= 1; --$i) {
    if ($a[$i] > 0) {
        $logs[] = [$a[0], $a[$i]];
        $a[0] -= $a[$i];
    } else {
        $logs[] = [$a[$n - 1], $a[$i]];
        $a[$n - 1] -= $a[$i];
    }
}
$logs[] = [$a[$n - 1], $a[0]];
$m = $a[$n - 1] - $a[0];
echo $m, PHP_EOL;
foreach ($logs as $log) {
    echo implode(' ', $log), PHP_EOL;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
