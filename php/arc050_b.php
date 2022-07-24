<?php

list($C, $c) = strs();
echo $C === strtoupper($c) ? 'Yes' : 'No';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
