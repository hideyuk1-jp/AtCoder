<?php
list($n, $m) = ints();
$play = 0;
// case[i] = j iの曲が入っているケースj
for ($i = 1; $i <= $n; ++$i) $case[$i] = $i;
for ($i = 0; $i < $m; ++$i) {
    list($d) = ints();
    $case[$play] = $case[$d];
    unset($case[$d]);
    $play = $d;
}
$case = array_flip($case);
ksort($case);
echo implode(PHP_EOL, $case) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
