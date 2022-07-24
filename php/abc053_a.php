<?php

list($x) = ints();
echo $x < 1200 ? 'ABC' : 'ARC';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
