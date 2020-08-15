<?php
list($n, $k) = ints();
$p = ints();
for ($i = 0; $i < $n; ++$i) --$p[$i];
$c = ints();
$max = PHP_INT_MIN;
for ($i = 0; $i < $n; ++$i) {
    $s = 0;
    $cur = $i;
    $cnt = 0;
    $_max = [PHP_INT_MIN];
    while (true) {
        ++$cnt;
        $cur = $p[$cur];
        $s += $c[$cur];
        $_max[] = max($_max[$cnt - 1], $s);
        if ($cur === $i) break;
    }
    if ($k <= $cnt) {
        $max = max($max, $_max[$k]);
        continue;
    }
    if ($s <= 0) {
        $max = max($max, $_max[$cnt]);
        continue;
    }
    $t = $k % $cnt;
    $tt = intdiv($k - $cnt, $cnt);
    $max = max($max, max($_max[$cnt], $s + $_max[$t]) + $s * $tt);
}
echo $max;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
