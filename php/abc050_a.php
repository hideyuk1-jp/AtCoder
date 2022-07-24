<?php

list($a, $op, $b) = strs();
echo $op === '+' ? $a + $b : $a - $b;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
