<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) list($a[]) = ints();
if ($n === 1 && $a[0] === 0) exit('0');
if ($a[0] !== 0) exit('-1');
$ans = 0;
for ($i = $n - 1; $i >= 1; --$i) {
    if ($a[$i] > $a[$i - 1] + 1) exit('-1');
    if ($a[$i] === 0) continue;
    ++$ans;
    if ($a[$i] > 1 && $a[$i - 1] >= $a[$i]) $ans += $a[$i] - 1;
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
