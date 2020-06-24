<?php
list($n, $x) = ints();
$dp[-1][0] = 1;
for ($i = 0; $i < $n; ++$i) {
    list($w) = ints();
    $dp[$i] = $dp[$i - 1];
    foreach ($dp[$i - 1] as $j => $v) {
        if (isset($dp[$i][$j + $w])) $dp[$i][$j + $w] += $v;
        else $dp[$i][$j + $w] = $v;
    }
}
echo ($dp[$n - 1][$x] ?? '0') . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
