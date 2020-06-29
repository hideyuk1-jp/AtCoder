<?php
list($n, $k) = ints();
$t3 = 0;
for ($i = 0; $i < $n; ++$i) {
    list($t[$i]) = ints();
    $t3 += $t[$i] - ($t[$i - 3] ?? 0);
    if ($i >= 2 && !isset($ans) && $t3 < $k) $ans = $i;
}
echo isset($ans) ? $ans + 1 : '-1';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
