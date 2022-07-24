<?php

list($n) = ints();
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    list($l, $r) = ints();
    $ans += $r - $l + 1;
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
