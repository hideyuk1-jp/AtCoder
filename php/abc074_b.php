<?php

list($n) = ints();
list($k) = ints();
$x = ints();
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    $ans += 2 * min($k - $x[$i], $x[$i]);
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
