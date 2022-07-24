<?php

list($n) = ints();
$a = ints();
for ($i = 0; $i < $n; ++$i) {
    if (isset($cnt[$a[$i]])) {
        $cnt[$a[$i]]++;
    } else {
        $cnt[$a[$i]] = 1;
    }
}
if (isset($cnt[1])) {
    if ($cnt[1] > 1) {
        exit('0');
    } else {
        exit('1');
    }
}
$max = max($a);
ksort($cnt);
$isPrime = isPrimeArr($max);
$ans = 0;
foreach ($cnt as $i => $v) {
    if ($v === 1 && $isPrime[$i]) {
        $ans++;
    }
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

function isPrimeArr($max)
{
    global $cnt;
    $arr = array_fill(0, $max + 1, true);
    foreach ($cnt as $i => $v) {
        if (!$arr[$i]) {
            continue;
        }
        for ($j = 2 * $i; $j <= $max; $j += $i) {
            $arr[$j] = false;
        }
    }
    return $arr;
}
