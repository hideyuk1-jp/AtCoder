<?php

[$a, $b] = ints();
echo $b >= $a && $b <= $a * 6 ? 'Yes' : 'No';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
