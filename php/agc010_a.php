<?php

list($n) = ints();
$a = ints();
$c = 0;
for ($i = 0; $i < $n; ++$i) {
    $c += $a[$i] % 2;
}
echo $c % 2 ? 'NO' : 'YES';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
