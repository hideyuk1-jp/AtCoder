<?php

list($a, $b) = strs();
echo($a . $b) * 2;
echo PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
