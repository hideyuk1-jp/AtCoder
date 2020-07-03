<?php
list($s) = strs();
if (strlen($s) % 2 || $s !== str_repeat('hi', intdiv(strlen($s), 2))) exit('No' . PHP_EOL);
echo 'Yes' . PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
