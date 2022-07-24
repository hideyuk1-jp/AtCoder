<?php

$x = ints();
$ans = array_diff([1, 2, 3, 4, 5], $x);
var_dump($ans);
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
