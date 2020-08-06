<?php
list($N, $C) = ints();
$T = 10 ** 5;
$cusum = array_fill(0, $C, array_fill(0, $T, 0));
for ($i = 0; $i < $N; ++$i) {
    list($s, $t, $c) = ints();
    --$s;
    --$t;
    --$c;
    ++$cusum[$c][$s];
    if ($t + 1 < $T) --$cusum[$c][$t + 1];
}
$max = 0;
for ($i = 0; $i < $T; ++$i) {
    $cnt = 0;
    for ($j = 0; $j < $C; ++$j) {
        $cusum[$j][$i] += $cusum[$j][$i - 1] ?? 0;
        $cnt += min(1, $cusum[$j][$i]);
    }
    $max = max($max, $cnt);
}
echo $max;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
