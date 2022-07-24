<?php

list($n) = ints();
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    list($a, $b) = ints();
    $ans += $a * $b;
}
echo (int) ($ans * 1.05);
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
