<?php

list($n, $h, $w) = ints();
$cnt = 0;
for ($i = 0; $i < $n; ++$i) {
    list($a, $b) = ints();
    if ($a >= $h && $b >= $w) {
        ++$cnt;
    }
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
