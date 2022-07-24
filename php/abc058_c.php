<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($s) = strs();
    $l = strlen($s);
    for ($j = 0; $j < $l; ++$j) {
        if (isset($cnt[$s[$j]][$i])) {
            $cnt[$s[$j]][$i]++;
        } else {
            $cnt[$s[$j]][$i] = 1;
        }
    }
}
ksort($cnt);
$ans = '';
foreach ($cnt as $c => $v) {
    if (count($v) < $n) {
        continue;
    }
    $ans .= str_repeat($c, min($v));
}
echo $ans;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
