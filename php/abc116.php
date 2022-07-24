<?php

// B
fscanf(STDIN, '%d', $s);
$n = 1000000;
$a = $s;
$c[$s] = true;
for ($i = 2; $i <= $n; $i++) {
    $a = ($a & 1) ? 3 * $a + 1 : $a / 2;
    if (isset($c[$a])) {
        break;
    }
    $c[$a] = true;
}
echo $i;

function f($n)
{
    return ($n & 1) ? 3 * $n + 1 : $n / 2;
}

exit;

// A
fscanf(STDIN, '%d %d %d', $ab, $bc, $ca);
echo $ab * $bc / 2;

exit;

// C
fscanf(STDIN, '%d', $n);
$h = array_map('intval', explode(' ', trim(fgets(STDIN))));

$ans = func($h);
echo $ans . PHP_EOL;

function func($h, $_min = 0)
{
    $min = max($h);
    $j = 0;
    foreach ($h as $i => $v) {
        if ($v > $_min) {
            $min = min($min, $v);
        }
        if ($v > $_min && ($h[$i + 1] ?? $_min) <= $_min) {
            $j++;
        }
    }
    $sum = ($min - $_min) * $j;
    if ($min === max($h)) {
        return $sum;
    } else {
        return $sum + func($h, $min);
    }
}
