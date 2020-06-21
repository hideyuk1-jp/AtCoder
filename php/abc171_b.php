<?php
list($n, $k) = ints();
$p = ints();
sort($p);
echo array_sum(array_slice($p, 0, $k));
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
