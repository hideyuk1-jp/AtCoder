<?php
list($n) = ints();
echo isHarshad($n) ? 'Yes' : 'No';

function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}

function isHarshad($n)
{
    return $n % array_sum(array_map('intval', str_split((string) $n))) === 0;
}
