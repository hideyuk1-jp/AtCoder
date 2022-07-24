<?php

list($a, $b, $c, $d) = ints();
if ($a + $b > $c + $d) {
    exit('Left');
}
if ($a + $b === $c + $d) {
    exit('Balanced');
}
echo 'Right';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
