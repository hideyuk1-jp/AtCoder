<?php
list($n) = ints();
$max = 0;
for ($i = 0; $i < $n; ++$i) {
    $a = ints();
    $s = array_sum($a) - $a[4] * 790 / 900;
    $max = max($max, $s);
}
echo $max . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
