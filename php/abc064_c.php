<?php

list($n) = ints();
$a = ints();
$cnt = array_fill(0, 10, 0);
for ($i = 0; $i < $n; ++$i) {
    if ($a[$i] < 400) {
        $cnt[0]++;
    } elseif ($a[$i] < 800) {
        $cnt[1]++;
    } elseif ($a[$i] < 1200) {
        $cnt[2]++;
    } elseif ($a[$i] < 1600) {
        $cnt[3]++;
    } elseif ($a[$i] < 2000) {
        $cnt[4]++;
    } elseif ($a[$i] < 2400) {
        $cnt[6]++;
    } elseif ($a[$i] < 2800) {
        $cnt[7]++;
    } elseif ($a[$i] < 3200) {
        $cnt[8]++;
    } else {
        $cnt[9]++;
    }
}
$ans = 0;
for ($i = 0; $i < 9; ++$i) {
    if ($cnt[$i] > 0) {
        $ans++;
    }
}
echo implode(' ', [max(1, $ans), $ans + $cnt[9]]);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
