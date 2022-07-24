<?php

[$N, $A, $B] = ints();
echo $N - $A + $B;
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
