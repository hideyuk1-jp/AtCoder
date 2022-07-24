<?php

list($a, $b) = ints();
echo (int) ceil(($a + $b) / 2);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
