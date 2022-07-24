<?php

list($n) = ints();
list($s) = strs();
$max = $x = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($s[$i] === 'I') {
        ++$x;
    } elseif ($s[$i] === 'D') {
        --$x;
    }
    $max = max($max, $x);
}
echo $max;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
