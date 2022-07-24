<?php

list($n) = ints();
$a = array_fill(0, $n, []);
for ($i = 1; $i < $n; ++$i) {
    list($b) = ints();
    $b--;
    $a[$b][] = $i;
}
for ($i = $n - 1; $i >= 0; --$i) {
    if (count($a[$i]) === 0) {
        $s[$i] = 1;
        continue;
    }
    $t = [];
    foreach ($a[$i] as $buka) {
        $t[] = $s[$buka];
    }
    $s[$i] = max($t) + min($t) + 1;
}
echo $s[0] . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
