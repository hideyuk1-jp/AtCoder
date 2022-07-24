<?php

list($s) = strs();
echo $s[strlen($s) - 1] === 'T' ? 'YES' : 'NO';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
