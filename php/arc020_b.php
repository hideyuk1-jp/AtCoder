<?php
list($n, $c) = ints();
$codd = $cnoun = [];
for ($i = 0; $i < $n; ++$i) {
    list($a) = ints();
    if ($i % 2) {
        if (isset($codd[$a])) ++$codd[$a];
        else $codd[$a] = 1;
    } else {
        if (isset($cnoun[$a])) ++$cnoun[$a];
        else $cnoun[$a] = 1;
    }
}
$min = PHP_INT_MAX;
$sodd = array_sum($codd);
$snoun = array_sum($cnoun);
for ($i = 1; $i <= 10; ++$i) {
    for ($j = 1; $j <= 10; ++$j) {
        if ($i === $j) continue;
        $min = min($min, ($sodd - $codd[$i] + $snoun - $cnoun[$j]) * $c);
    }
}
echo $min . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
