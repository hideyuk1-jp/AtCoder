<?php

list($a, $b) = strs();
if ($a === 'H') {
    echo $b;
} else {
    echo $b === 'H' ? 'D' : 'H';
}
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
