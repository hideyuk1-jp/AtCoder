<?php

[$n, $q] = ints();
$a = ints();
$ans = [];
for ($i = 0; $i < $q; ++$i) {
    [$k] = ints();
    $ans[] = calc($k);
}
echo implode(PHP_EOL, $ans);
function calc($k)
{
    global $a, $n;
    $ok = $n;
    $ng = -1;
    while (abs($ok - $ng) > 1) {
        $mid = intdiv($ok + $ng, 2);
        if ($k <= $a[$mid] - $mid - 1) {
            $ok = $mid;
        } else {
            $ng = $mid;
        }
    }
    if ($ok === $n) {
        return $a[$ok - 1] + ($k - ($a[$ok - 1] - ($ok - 1) - 1));
    } else {
        return $a[$ok] - ($a[$ok] - $ok - $k);
    }
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
