<?php

list($n, $r) = ints();
list($s) = strs();
for ($i = 0; $i < $n; ++$i) {
    if ($s[$i] === '.') {
        $none[] = $i;
    }
}
if (!isset($none)) {
    exit('0' . PHP_EOL);
}
$max = $none[count($none) - 1];
$cnt = 0;
$ok = -1;
foreach ($none as $i) {
    $pos = min($i, max($max - $r + 1, 0));
    if ($pos + $r - 1 < $max && $pos <= $ok) {
        continue;
    }
    $ok = $pos + $r - 1;
    ++$cnt;
    if ($ok >= $max) {
        break;
    }
}
echo($pos + $cnt) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
