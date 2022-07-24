<?php

list($n, $m) = ints();
list($name) = strs();
list($kit) = strs();
for ($i = 0; $i < $n; ++$i) {
    if (isset($cntName[$name[$i]])) {
        ++$cntName[$name[$i]];
    } else {
        $cntName[$name[$i]] = 1;
    }
}
for ($i = 0; $i < $m; ++$i) {
    if (isset($cntKit[$kit[$i]])) {
        ++$cntKit[$kit[$i]];
    } else {
        $cntKit[$kit[$i]] = 1;
    }
}
$ans = 0;
foreach ($cntName as $s => $c) {
    if (!isset($cntKit[$s])) {
        exit('-1' . PHP_EOL);
    }
    $ans = max($ans, intdiv($c, $cntKit[$s]) + min(1, $c % $cntKit[$s]));
}
echo $ans . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
