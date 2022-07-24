<?php

list($h, $w) = ints();
list($n) = ints();
$a = ints();
$c = 0;
for ($i = 0; $i < $n; ++$i) {
    for ($j = 0; $j < $a[$i]; ++$j) {
        $l = intdiv($c, $w);
        $m = $c % $w;
        if ($l % 2) {
            $m = $w - 1 - $m;
        }
        $ans[$l][$m] = $i + 1;
        $c++;
    }
}
for ($i = 0; $i < $h; ++$i) {
    for ($j = 0; $j < $w; ++$j) {
        echo $ans[$i][$j];
        echo $j < $w - 1 ? ' ' : PHP_EOL;
    }
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
