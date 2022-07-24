<?php

list($a) = ints();
list($b) = ints();
list($h) = ints();
echo($a + $b) * $h / 2;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
