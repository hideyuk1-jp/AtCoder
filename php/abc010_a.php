<?php

list($s) = strs();
echo $s . 'pp' . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
