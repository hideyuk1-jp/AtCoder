<?php
list($s) = strs();
list($t) = strs();
echo $s == 'Y' ? strtoupper($t) : $t;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
