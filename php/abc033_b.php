<?php
list($n) = ints();
$sum = 0;
for ($i = 0; $i < $n; ++$i) {
    list($s[$i], $p[$i]) = strs();
    $sum += $p[$i];
}
$ans = 'atcoder';
for ($i = 0; $i < $n; ++$i) if ($p[$i] > intdiv($sum, 2)) $ans = $s[$i];
echo $ans . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
