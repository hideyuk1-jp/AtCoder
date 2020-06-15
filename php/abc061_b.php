<?php
list($n, $m) = ints();

for ($i = 0; $i < $m; ++$i) {
    list($a, $b) = ints();
    $a--;
    $b--;
    $g[$a][] = $b;
    $g[$b][] = $a;
}
for ($i = 0; $i < $n; ++$i) $ans[] = count($g[$i] ?? []);
echo implode(PHP_EOL, $ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
