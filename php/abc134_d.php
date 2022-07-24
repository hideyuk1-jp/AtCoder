<?php

list($n) = ints();
$a = ints();
for ($i = $n - 1; $i >= 0; --$i) {
    $t = 0;
    for ($j = $i + $i + 1; $j < $n; $j += $i + 1) {
        $t += $b[$j];
    }
    $b[$i] = ($t + $a[$i]) % 2;
}
for ($i = 0; $i < $n; ++$i) {
    if ($b[$i] === 1) {
        $ans[] = $i + 1;
    }
}
echo count($ans) . PHP_EOL;
echo implode(' ', $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
