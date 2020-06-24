<?php
list($R, $C, $K) = ints();
list($N) = ints();
for ($i = 0; $i < $N; ++$i) {
    list($r, $c) = ints();
    --$r;
    --$c;
    if (isset($cntr[$r])) $cntr[$r]++;
    else $cntr[$r] = 1;
    if (isset($cntc[$c])) $cntc[$c]++;
    else $cntc[$c] = 1;
    $isExit[$r][$c] = true;
}
$ans = 0;
for ($i = 0; $i < $R; ++$i) {
    for ($j = 0; $j < $C; ++$j) {
        $c = ($cntr[$i] ?? 0) + ($cntc[$j] ?? 0);
        if ($isExit[$i][$j]) --$c;
        if ($c === $K) ++$ans;
    }
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
