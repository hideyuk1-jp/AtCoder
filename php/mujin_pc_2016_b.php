<?php
$l  = ints();
$R = array_sum($l);
$r = max(0, max($l) - (array_sum($l) - max($l)));
echo $R ** 2 * pi() - $r ** 2 * pi();
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
