<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) list($x[], $y[]) = ints();
$max = PHP_INT_MIN;
for ($i = 0; $i < $n; ++$i) {
    for ($j = 0; $j < $n; ++$j) {
        $d = sqrt(($x[$i] - $x[$j]) ** 2 + ($y[$i] - $y[$j]) ** 2);
        $max = max($max, $d);
    }
}
echo $max . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
