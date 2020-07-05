<?php
list($n) = ints();
$i = 1;
$ans = 0;
while (true) {
    $m = intdiv($n - $i,  $i);
    if ($m <= $i) break;
    if (($n - $i) % $i === 0) $ans += $m;
    $i++;
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
