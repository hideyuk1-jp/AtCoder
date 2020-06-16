<?php
list($a, $b, $c) = ints();
echo $b - $a === $c - $b ? 'YES' : 'NO';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
