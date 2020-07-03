<?php
list($n, $a, $b) = ints();
echo implode(' ', [min($a, $b), max(0, $a + $b - $n)]);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
