<?php
list($n) = ints();
$d = 2025 - $n;
for ($i = 1; $i < 10; ++$i) {
    if ($d % $i || intdiv($d, $i) > 9) continue;
    $a[] = $i . ' x ' . intdiv($d, $i);
}
echo implode(PHP_EOL, $a) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
