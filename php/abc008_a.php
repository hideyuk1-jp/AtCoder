<?php

list($s, $t) = ints();
echo($t - $s + 1) . PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
