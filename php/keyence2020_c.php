<?php

list($n, $k, $s) = ints();
for ($i = 0; $i < $n; ++$i) {
    $a[] = $i < $k ? $s : $s % 10 ** 9 + 1;
}
echo implode(' ', $a);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
