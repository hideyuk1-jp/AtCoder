<?php

list($x, $y) = ints();
$ans = 0;
while ($x <= $y) {
    $ans++;
    $x *= 2;
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
