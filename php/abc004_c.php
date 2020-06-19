<?php
list($n) = ints();
$n %= 30;
$a = [1, 2, 3, 4, 5, 6];
for ($i = 0; $i < $n; ++$i) list($a[$i % 5], $a[$i % 5 + 1]) = [$a[$i % 5 + 1], $a[$i % 5]];
echo implode('', $a) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
