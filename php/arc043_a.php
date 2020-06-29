<?php
list($n, $a, $b) = ints();
for ($i = 0; $i < $n; ++$i) list($s[]) = ints();
$avg = array_sum($s) / $n;
$diff = max($s) - min($s);
if ($diff === 0) exit('-1' . PHP_EOL);
$p = $b / $diff;
$q = $a - $avg * $p;
echo $p . ' ' . $q . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
