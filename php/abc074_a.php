<?php

list($n) = ints();
list($a) = ints();
echo $n * $n - $a;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
