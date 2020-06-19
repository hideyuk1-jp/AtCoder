<?php
list($n, $k) = ints();
$r = ints();
rsort($r);
$r = array_slice($r, 0, $k);
sort($r);
$ans = 0;
for ($i = 0; $i < $k; ++$i) $ans = ($ans + $r[$i]) / 2;
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
