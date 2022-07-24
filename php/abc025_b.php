<?php

list($n, $a, $b) = ints();
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    list($s, $d) = strs();
    $d = (int) $d;
    $ans = $s === 'East' ? $ans + max(min($d, $b), $a) : $ans - max(min($d, $b), $a);
}
if ($ans === 0) {
    exit('0' . PHP_EOL);
}
if ($ans > 0) {
    exit('East ' . $ans . PHP_EOL);
}
echo 'West ' . (-$ans) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
