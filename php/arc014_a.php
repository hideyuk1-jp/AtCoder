<?php

list($n) = ints();
echo $n % 2 ? 'Red' : 'Blue';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
