<?php

list($a, $b, $c) = strs();
echo $a[strlen($a) - 1] === $b[0] && $b[strlen($b) - 1] === $c[0] ? 'YES' : 'NO';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
