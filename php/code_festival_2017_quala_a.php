<?php
list($s) = strs();
echo substr($s, 0, 4) === 'YAKI' ? 'Yes' : 'No';
echo PHP_EOL;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
