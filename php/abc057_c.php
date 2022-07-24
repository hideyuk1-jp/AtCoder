<?php

list($n) = ints();
$ans = PHP_INT_MAX;
for ($i = 1; $i <= (int) sqrt($n); ++$i) {
    if ($n % $i) {
        continue;
    }
    $f = max(strlen((string) $i), strlen((string) intdiv($n, $i)));
    $ans = min($ans, $f);
}
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
