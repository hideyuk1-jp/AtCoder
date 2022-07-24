<?php

list($n, $m) = ints();
list($s) = strs();
list($t) = strs();
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
