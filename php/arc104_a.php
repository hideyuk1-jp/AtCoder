<?php
[$A, $B] = ints();
echo ($A + $B) / 2, " ", $A - ($A + $B) / 2;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
