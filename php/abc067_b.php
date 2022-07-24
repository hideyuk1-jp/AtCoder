<?php

list($n, $k) = ints();
$l = ints();
rsort($l);
echo array_sum(array_splice($l, 0, $k));
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
