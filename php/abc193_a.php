<?php

[$A, $B] = ints();
echo($A - $B) / $A * 100;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
