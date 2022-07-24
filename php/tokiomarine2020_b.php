<?php

list($a, $v) = ints();
list($b, $w) = ints();
list($t) = ints();
$D = abs($a - $b);
$V = $v - $w;
if ($D === 0) {
    exit('YES');
}
if ($V <= 0) {
    exit('NO');
}
echo $D / $V <= $t ? 'YES' : 'NO';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
