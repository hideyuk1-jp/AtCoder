<?php

list($a, $b, $c, $d) = ints();
echo max(0, min($b, $d) - max($a, $c));
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
