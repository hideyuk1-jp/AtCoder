<?php

list($r, $g, $b) = ints();
echo($r * 100 + $g * 10 + $b) % 4 === 0 ? 'YES' : 'NO';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
