<?php

list($n, $d) = ints();
$cnt = 0;
for ($i = 0; $i < $n; ++$i) {
    list($x, $y) = ints();
    if ($x ** 2 + $y ** 2 <= $d ** 2) {
        ++$cnt;
    }
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
