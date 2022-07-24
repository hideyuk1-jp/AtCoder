<?php

list($n) = ints();
$l = ints();
sort($l);
$ans = 0;
for ($i = 0; $i < 2 * $n; $i += 2) {
    $ans += $l[$i];
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
