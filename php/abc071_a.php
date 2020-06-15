<?php
list($x, $a, $b) = ints();
echo abs($x - $a) < abs($x - $b) ? 'A' : 'B';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
