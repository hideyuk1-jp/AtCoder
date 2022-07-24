<?php

list($n) = ints();
$a = ints();
$ans = PHP_INT_MAX;
for ($i = -100; $i <= 100; ++$i) {
    $c = 0;
    for ($j = 0; $j < $n; ++$j) {
        $c += pow($i - $a[$j], 2);
    }
    $ans = min($ans, $c);
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
