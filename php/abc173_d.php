<?php
list($n) = ints();
$a = ints();
rsort($a);
$t = [];
for ($i = 0; $i < $n; ++$i) {
    $t[] = $a[$i];
    if (count($t) === $n - 1) break;
    if ($i > 0) $t[] = $a[$i];
    if (count($t) === $n - 1) break;
}
echo array_sum($t);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
