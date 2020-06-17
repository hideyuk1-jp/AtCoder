<?php
list($n, $k) = ints();
$a = ints();
for ($i = 0; $i <= $n; ++$i) $sum[$i] = ($a[$i - 1] ?? 0) + ($sum[$i - 1] ?? 0);
$ans = 0;
for ($i = 0; $i < $n - $k + 1; ++$i) $ans += $sum[$i + $k] - $sum[$i];
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
