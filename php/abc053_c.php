<?php

list($x) = ints();
echo intdiv($x, 11) * 2 + (int) ceil(($x % 11) / 6);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
