<?php

list($n) = ints();
$a = ints();
rsort($a);
$ans = 0;
for ($i = 0; $i < $n * 2; $i += 2) {
    $ans += $a[$i + 1];
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
