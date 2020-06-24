<?php
list($n, $m, $a, $b) = ints();
for ($i = 0; $i < $m; ++$i) {
    list($c) = ints();
    if ($n <= $a) $n += $b;
    $n -= $c;
    if ($n < 0) exit((string) ($i + 1) . PHP_EOL);
}
echo 'complete' . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
