<?php

list($n, $q) = ints();
for ($i = 0; $i < $n; ++$i) {
    $c[] = ints();
}
for ($i = 0; $i < $q; ++$i) {
    list($a, $b) = ints();
    $ans[$i] = 0;
    for ($k = 0; $k < $n; ++$k) {
        list($x, $r, $h) = $c[$k];
        if ($x >= $b || $x + $h <= $a) {
            continue;
        }
        if ($x >= $a) {
            $ans[$i] += $r * $r * pi() * $h / 3;
        } else {
            $_h = ($x + $h) - $a;
            $_r = $r * $_h / $h;
            $ans[$i] += $_r * $_r * pi() * $_h / 3;
        }
        if ($x + $h > $b) {
            $_h = ($x + $h) - $b;
            $_r = $r * $_h / $h;
            $ans[$i] -= $_r * $_r * pi() * $_h / 3;
        }
    }
}
echo implode(PHP_EOL, $ans) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
