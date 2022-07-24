<?php

list($n) = ints();
$p = [1, 1];
for ($i = 0; $i < $n; ++$i) {
    $a = ints();
    if ($a[0] >= $p[0] && $a[1] >= $p[1]) {
        $p = $a;
        continue;
    }
    $m = max(intdivceil($p[0], $a[0]), intdivceil($p[1], $a[1]));
    $p = [$a[0] * $m, $a[1] * $m];
}
echo array_sum($p);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
function intdivceil($a, $b)
{
    return $a % $b ? intdiv($a, $b) + 1 : intdiv($a, $b);
}
