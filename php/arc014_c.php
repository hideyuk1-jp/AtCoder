<?php
list($n) = ints();
list($s) = strs();
foreach (['R', 'G', 'B'] as $v) $cnt[$v] = 0;
for ($i = 0; $i < $n; ++$i) ++$cnt[$s[$i]];
$ans = 0;
foreach (['R', 'G', 'B'] as $v) $ans += $cnt[$v] % 2;
echo $ans . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
