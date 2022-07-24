<?php

list($n) = ints();
list($a, $b) = ints();
if ($a === $b) {
    if ($n <= $a) {
        $ans = 'Takahashi';
    } elseif ($n % ($a + 1) === 0) {
        $ans = 'Aoki';
    } else {
        $ans = 'Takahashi';
    }
} else {
    if ($a > $b || $n <= $a) {
        $ans = 'Takahashi';
    } else {
        $ans = 'Aoki';
    }
}
echo $ans, PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
