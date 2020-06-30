<?php
list($n, $x) = ints();
$a = ints();
sort($a);
$cnt = 0;
for ($i = 0; $i < $n; ++$i) {
    if ($x < $a[$i]) break;
    if ($i < $n - 1) {
        ++$cnt;
        $x -= $a[$i];
    } elseif ($x === $a[$i]) {
        ++$cnt;
    }
}
echo $cnt;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
