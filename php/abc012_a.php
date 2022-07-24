<?php

list($a, $b) = ints();
echo $b . ' ' . $a . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
