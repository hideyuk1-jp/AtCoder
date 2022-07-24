<?php

list($a) = strs();
list($b) = strs();
echo strlen($a) > strlen($b) ? $a : $b;
echo PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
