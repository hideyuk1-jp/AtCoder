<?php

list($a) = ints();
echo $a + $a ** 2 + $a ** 3;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
