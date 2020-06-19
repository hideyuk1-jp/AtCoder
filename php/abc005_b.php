<?php
list($n) = ints();
$min = PHP_INT_MAX;
for ($i = 0; $i < $n; ++$i) {
    list($t) = ints();
    $min = min($min, $t);
}
echo $min . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
