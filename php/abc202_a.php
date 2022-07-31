<?php

$a = ints();
echo 21 - array_sum($a);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
