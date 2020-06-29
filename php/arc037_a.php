<?php
list($n) = ints();
$m = ints();
$ans = 0;
for ($i = 0; $i < $n; ++$i) $ans += max(0, 80 - $m[$i]);
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
