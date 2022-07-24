<?php

list($n) = ints();
$cnt = array_fill(1, $n, 0);
for ($i = 0; $i < $n; ++$i) {
    list($a) = ints();
    ++$cnt[$a];
}
if (min($cnt) === 1) {
    exit('Correct');
}
for ($i = 1; $i <= $n; ++$i) {
    if ($cnt[$i] === 0) {
        $x = $i;
    }
    if ($cnt[$i] === 2) {
        $y = $i;
    }
}
echo $y . ' ' . $x;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
