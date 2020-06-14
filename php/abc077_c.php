<?php
list($n) = ints();
$a = ints();
$b = ints();
$c = ints();
sort($a);
sort($b);
sort($c);
$ans = $i = $j = $k = 0;
while ($j < $n) {
    while ($i < $n && $b[$j] > $a[$i]) ++$i;
    while ($k < $n && $b[$j] >= $c[$k]) ++$k;
    $ans += $i * ($n - $k);
    ++$j;
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
