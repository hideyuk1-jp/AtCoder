<?php
list($n) = ints();
$k = 26;
$c = ints();
$last = array_fill(0, $k, 0);
for ($i = 1; $i <= $n; ++$i) $s[$i] = ints();
for ($i = 1; $i <= $n; ++$i) {
    list($t) = ints();
    --$t;
    $ans[$i] = ($ans[$i - 1] ?? 0) + $s[$i][$t];
    $last[$t] = $i;
    for ($j = 0; $j < $k; ++$j) {
        $ans[$i] -= $c[$j] * ($i - $last[$j]);
    }
}
list($m) = ints();
for ($i = 0; $i < $m; ++$i) {
}
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
