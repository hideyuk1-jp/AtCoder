<?php

list($n, $a, $b) = ints();
echo($b - $a - 1) % 2 ? 'Alice' : 'Borys';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
