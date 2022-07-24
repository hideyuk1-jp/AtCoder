<?php

list($n) = ints();
$a = ints();
$c = 0;
for ($i = 0; $i < $n; ++$i) {
    $c ^= $a[$i];
}
echo $c === 0 ? 'Yes' : 'No';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
