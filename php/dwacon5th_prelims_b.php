<?php
list($n, $k) = ints();
$a = ints();
$cusum[0] = 0;
for ($i = 1; $i <= $n; ++$i) $cusum[$i] = $cusum[$i - 1] + $a[$i - 1];
for ($l = 1; $l <= $n; ++$l)
    for ($r = $l; $r <= $n; ++$r)
        $beauty[] = $cusum[$r] - $cusum[$l - 1];
$ans = 0;
for ($t = strlen(decbin(max($beauty))) - 1; $t >= 0; --$t) {
    $cnt = 0;
    foreach ($beauty as $b)
        if ((($ans + (1 << $t)) & $b) === ($ans + (1 << $t))) ++$cnt;
    if ($cnt >= $k) $ans += 1 << $t;
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
