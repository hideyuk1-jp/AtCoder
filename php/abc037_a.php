<?php
list($a, $b, $c) = ints();
echo intdiv($c, min($a, $b));
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
