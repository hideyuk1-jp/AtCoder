<?php
list($n) = ints();
list($a) = ints();
echo ($n % 500) <= $a ? 'Yes' : 'No';

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
