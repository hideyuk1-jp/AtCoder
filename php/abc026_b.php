<?php
list($n) = ints();
for ($i = 0; $i < $n; ++$i) list($r[]) = ints();
rsort($r);
$ans = 0;
for ($i = 0; $i < $n; ++$i) {
    $s = $r[$i] * $r[$i] * pi();
    if ($i % 2 === 0) $ans += $s;
    else $ans -= $s;
}
echo $ans . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
