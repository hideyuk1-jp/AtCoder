<?php
list($k) = ints();
$a = 2;
$b = 1;
for ($i = 0; $i < $k - 1; ++$i) list($a, $b) = [$a + $b, $a];
echo implode(' ', [$a, $b]);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
