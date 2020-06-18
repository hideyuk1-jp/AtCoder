<?php
list($n, $m) = ints();
$a = abs(($n % 12) * 5 + $m / 60 * 5  - $m) * 6;
echo min($a, 360 - $a) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
