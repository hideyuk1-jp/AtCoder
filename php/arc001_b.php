<?php
list($a, $b) = ints();
$min = PHP_INT_MAX;
$d = abs($a - $b);
for ($i = 0; $i <= intval($d, 10) + min(1, $d % 10); ++$i) {
    $dd = abs($d - $i * 10);
    for ($j = 0; $j <= intval($dd, 5) + min(1, $dd % 5); ++$j) {
        $min = min($min, $i + $j + abs($dd - 5 * $j));
    }
}
echo $min . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
