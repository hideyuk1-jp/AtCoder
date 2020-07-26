<?php
list($n, $l) = ints();
$x = ints();
$hurdle = array_fill(0, $l, false);
for ($i = 0; $i < $n; ++$i) $hurdle[$x[$i]] = true;
$t = ints();
$dp[$l] = 0;
for ($i = $l - 1; $i >= 0; --$i) {
    $dp[$i] = $t[0] + $dp[$i + 1];

    if ($i + 2 <= $l) {
        $dp[$i] = min($dp[$i], $t[0] + $t[1] + $dp[$i + 2]);
    } else {
        $dp[$i] = min($dp[$i], intdiv($t[0], 2) + intdiv($t[1], 2));
    }

    if ($i + 4 <= $l) {
        $dp[$i] = min($dp[$i], $t[0] + $t[1] * 3 + $dp[$i + 4]);
    } else {
        $dp[$i] = min($dp[$i], intdiv($t[0], 2) + (int)(($l - $i - 0.5) * $t[1]));
    }

    if ($hurdle[$i]) $dp[$i] += $t[2];
}
echo $dp[0];
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
