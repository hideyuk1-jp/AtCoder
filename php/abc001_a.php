<?php

list($h[]) = ints();
list($h[]) = ints();
echo($h[0] - $h[1]) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
