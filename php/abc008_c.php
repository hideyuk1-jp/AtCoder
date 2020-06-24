<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) list($c[]) = ints();
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    $cnt = 0;
    for ($j = 0; $j < $n; ++$j) if ($i !== $j && $c[$i] % $c[$j] === 0) ++$cnt;
    if (($cnt + 1) % 2) $ans += (intdiv($cnt + 1, 2) + 1) / ($cnt + 1);
    else $ans += 1 / 2;
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
