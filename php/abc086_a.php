<?php
list($a, $b) = ints();
echo ($a * $b) % 2 === 1 ? 'Odd' : 'Even';

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
