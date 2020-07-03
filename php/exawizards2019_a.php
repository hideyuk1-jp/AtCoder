<?php
$a = ints();
echo count(array_unique($a)) === 1 ? 'Yes' : 'No';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
