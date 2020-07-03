<?php
list($a, $b, $c) = ints();
if ($b > $a) echo $c > $a && $c < $b ? 'Yes' : 'No';
else echo $c < $a && $c > $b ? 'Yes' : 'No';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
