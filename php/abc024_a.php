<?php
list($a, $b, $c, $k) = ints();
list($s, $t) = ints();
$ans = $s * $a + $t * $b;
if ($s + $t >= $k) $ans -= $c * ($s + $t);
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
