<?php
list($n) = ints();
list($k) = ints();
list($x) = ints();
list($y) = ints();
echo min($n, $k) * $x + max(0, $n - $k) * $y;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
