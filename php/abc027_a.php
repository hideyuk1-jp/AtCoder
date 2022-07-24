<?php

$l = ints();
echo pow(min($l) * max($l), 2) / ($l[0] * $l[1] * $l[2]);
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
