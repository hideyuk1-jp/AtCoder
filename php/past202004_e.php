<?php

list($n) = ints();
$a = ints();
for ($i = 0; $i < $n; ++$i) {
    $j = 1;
    $x = $a[$i] - 1;
    while ($x !== $i) {
        ++$j;
        $x = $a[$x] - 1;
    }
    $ans[] = $j;
}
echo implode(' ', $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
