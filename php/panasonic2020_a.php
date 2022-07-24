<?php

list($k) = ints();
$a = [1, 1, 1, 2, 1, 2, 1, 5, 2, 2, 1, 5, 1, 2, 1, 14, 1, 5, 1, 5, 2, 2, 1, 15, 2, 2, 5, 4, 1, 4, 1, 51];
echo $a[$k - 1];
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
