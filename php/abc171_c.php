<?php

list($n) = ints();
$ans = '';
while ($n !== 0) {
    --$n;
    $ans .= chr(97 + $n % 26);
    $n = intdiv($n, 26);
}
echo strrev($ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
