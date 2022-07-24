<?php

list($n, $k) = ints();
echo $k > 1 ? $n - $k : 0;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
