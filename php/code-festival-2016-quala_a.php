<?php
list($s) = strs();
echo substr_replace($s, ' ', 4, 0) . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
