<?php
list($a, $b) = ints();
echo $a % 3 === 0 || $b % 3 === 0 || ($a + $b) % 3 === 0 ? 'Possible' : 'Impossible';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
