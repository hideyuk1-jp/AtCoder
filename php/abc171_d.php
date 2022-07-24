<?php

list($n) = ints();
$a = ints();
for ($i = 0; $i < $n; ++$i) {
    if (isset($cnt[$a[$i]])) {
        ++$cnt[$a[$i]];
    } else {
        $cnt[$a[$i]] = 1;
    }
}
$sum = array_sum($a);
list($q) = ints();
$ans = [];
for ($i = 0; $i < $q; ++$i) {
    list($b, $c) = ints();
    if (isset($cnt[$b])) {
        $sum += ($c - $b) * $cnt[$b];
        if (isset($cnt[$c])) {
            $cnt[$c] += $cnt[$b];
        } else {
            $cnt[$c] = $cnt[$b];
        }
        unset($cnt[$b]);
    }
    $ans[] = $sum;
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
