<?php

list($n) = ints();
$a = ints();
$max = 0;
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    $ans += max(0, $max - $a[$i]);
    $max = max($max, $a[$i]);
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
