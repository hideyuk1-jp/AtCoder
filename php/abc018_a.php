<?php

list($a[]) = ints();
list($a[]) = ints();
list($a[]) = ints();
for ($i = 0; $i < 3; ++$i) {
    if ($a[$i] === max($a)) {
        $ans[] = 1;
    } elseif ($a[$i] === min($a)) {
        $ans[] = 3;
    } else {
        $ans[] = 2;
    }
}
echo implode(PHP_EOL, $ans) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
