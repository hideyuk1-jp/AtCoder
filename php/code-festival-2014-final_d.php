<?php

list($a) = ints();
echo($a + 1) . ' ' . (2) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
