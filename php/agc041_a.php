<?php
list($n, $a, $b) = ints();
if (($b - $a) % 2 === 0)
    echo intdiv($b - $a, 2);
else
    echo min($a - 1, $n - $b) + 1 + intdiv($b - $a - 1, 2);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
