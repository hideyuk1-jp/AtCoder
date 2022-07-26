<?php

[$n] = ints();
echo intdiv($n - 1, 100) + 1;

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
