<?php

list($n) = ints();
echo $n % 10 === 9 || intdiv($n, 10) % 10 === 9 ? 'Yes' : 'No';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
