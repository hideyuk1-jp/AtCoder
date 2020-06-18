<?php
list($s) = strs();
echo $s . 's' . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
