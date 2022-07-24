<?php

list($n) = ints();
$a = ints();
for ($i = 0; $i <= $n; ++$i) {
    $s[$i] = ($s[$i - 1] ?? 0) + ($a[$i - 1] ?? 0);
}
for ($i = 0; $i <= $n; ++$i) {
    if (isset($cnt[$s[$i]])) {
        ++$cnt[$s[$i]];
    } else {
        $cnt[$s[$i]] = 1;
    }
}
$ans = 0;
foreach ($cnt as $i => $v) {
    if ($i === 0) {
        $v;
    }
    $ans += $v * ($v - 1) / 2;
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
