<?php
list($n, $m) = ints();
list($x, $y) = ints();
$a = ints();
$b = ints();
$t = $i = $j = $ans = 0;
while (true) {
    while ($t > $a[$i]) {
        ++$i;
        if ($i > $n - 1) break 2;
    }
    $t = $a[$i] + $x;
    while ($t > $b[$j]) {
        ++$j;
        if ($j > $m - 1) break 2;
    }
    $t = $b[$j] + $y;
    $ans++;
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
