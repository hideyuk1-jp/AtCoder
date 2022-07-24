<?php

list($q) = ints();
echo $q === 1 ? 'ABC' : 'chokudai';
echo PHP_EOL;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
