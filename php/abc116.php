<?php
fscanf(STDIN, '%d', $n);
$h = array_map('intval', explode(' ', trim(fgets(STDIN))));

$ans = func($h);
echo $ans . PHP_EOL;

function func($h, $_min = 0) {
    $min = max($h);
    $j = 0;
    foreach ($h as $i => $v) {
        if ($v > $_min) {
            $min = min($min, $v);
        }
        if ($v > $_min && ($h[$i + 1] ?? $_min) <= $_min) $j++;
    }
    $sum = ($min - $_min) * $j;
    if ($min === max($h)) return $sum;
    else  return $sum + func($h, $min);
}
