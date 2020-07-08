<?php
list($n) = ints();
$d = ints();
for ($i = 0; $i < $n; ++$i) {
    if (isset($cnt[$d[$i]])) ++$cnt[$d[$i]];
    else $cnt[$d[$i]] = 1;
}
if (max($cnt) > 2) exit('0');
if (isset($cnt[0]) && $cnt[0] > 0) exit('0');
if (isset($cnt[12]) && $cnt[12] > 1) exit('0');
echo dfs();
function dfs($d = 0, $a = [0])
{
    global $cnt;
    if ($d === 13) return calcMinD($a);
    if (!isset($cnt[$d])) return dfs($d + 1, $a);
    if ($d === 0 || $d === 12) return dfs($d + 1, array_merge($a, [$d]));

    if ($cnt[$d] === 2) return dfs($d + 1, array_merge($a, [$d, 24 - $d]));

    $res[] = dfs($d + 1, array_merge($a, [$d]));
    $res[] = dfs($d + 1, array_merge($a, [24 - $d]));

    return max($res);
}
function calcMinD($a)
{
    $n = count($a);
    $min = PHP_INT_MAX;
    for ($i = 0; $i < $n - 1; ++$i) {
        for ($j = $i + 1; $j < $n; ++$j) {
            $d = min(abs($a[$i] - $a[$j]), 24 - abs($a[$i] - $a[$j]));
            $min = min($min, $d);
        }
    }
    return $min;
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
