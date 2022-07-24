<?php

list($n, $a, $b) = ints();
$x = ints();
$ans = 0;
for ($i = 1; $i < $n; ++$i) {
    $ans += min(($x[$i] - $x[$i - 1]) * $a, $b);
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
