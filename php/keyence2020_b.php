<?php

list($n) = ints();
for ($i = 0; $i < $n; ++$i) {
    list($x, $l) = ints();
    $s[] = max(0, $x - $l);
    $e[] = $x + $l;
}
array_multisort($e, SORT_ASC, $s);
$t = 0;
$cnt = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($s[$i] >= $t) {
        ++$cnt;
        $t = $e[$i];
    }
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
