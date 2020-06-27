<?php
list($n) = ints();
$a = [];
$cnt = 1;
for ($i = 0; $i < $n; ++$i) {
    list($color[$i]) = ints();
    if ($i === 0) continue;
    if ($color[$i] === $color[$i - 1]) {
        ++$cnt;
    } else {
        $a[] = $cnt;
        $cnt = 1;
    }
}
if ($color[0] === $color[$n - 1]) $a[0] += $cnt;
else $a[] = $cnt;
if (count($a) === 1) exit('-1' . PHP_EOL);
echo (intdiv(max($a) - 1, 2) + 1) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
