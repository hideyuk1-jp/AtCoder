<?php

list($m1, $d1) = ints();
list($m2, $d2) = ints();
echo $d2 === 1 ? 1 : 0;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
