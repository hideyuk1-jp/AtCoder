<?php
list($s1) = strs();
list($s2) = strs();
list($s3) = strs();
$n = intdiv(strlen($s1), 2);
for ($i = 0; $i < 2 * $n; ++$i) {
    if (isset($cnt3[$s3[$i]])) ++$cnt3[$s3[$i]];
    else $cnt3[$s3[$i]] = 1;
}
for ($i = 0; $i < 2 * $n; ++$i) {
    if (isset($cnt3[$s1[$i]])) {
        if (isset($cnt1[$s1[$i]])) ++$cnt1[$s1[$i]];
        else $cnt1[$s1[$i]] = 1;
    }
    if (isset($cnt3[$s2[$i]])) {
        if (isset($cnt2[$s2[$i]])) ++$cnt2[$s2[$i]];
        else $cnt2[$s2[$i]] = 1;
    }
}
$min = $max = 0;
foreach ($cnt3 as $s => $c) {
    if (($cnt1[$s] ?? 0) + ($cnt2[$s] ?? 0) < $c) exit('NO' . PHP_EOL);

    if (isset($cnt1[$s]) && isset($cnt2[$s])) {
        $min += max(0, $c - $cnt2[$s]);
        $max += min($c, $cnt1[$s]);
    } elseif (isset($cnt1[$s])) {
        $min += $c;
        $max += $c;
    }
}
echo $min <= $n && $max >= $n ? 'YES' : 'NO';
echo PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
