<?php

list($x, $t) = ints();
echo max(0, $x - $t);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
