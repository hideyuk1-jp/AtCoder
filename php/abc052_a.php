<?php
list($a, $b, $c, $d) = ints();
echo max($a * $b, $c * $d);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
