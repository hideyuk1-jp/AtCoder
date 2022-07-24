<?php

$a = ints();
echo count(array_unique($a));
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
