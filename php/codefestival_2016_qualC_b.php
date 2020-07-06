<?php
list($k, $t) = ints();
$a = ints();
echo array_sum($a) - max($a) >= max($a) - 1 ? 0 : max($a) - 1 - (array_sum($a) - max($a));
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
