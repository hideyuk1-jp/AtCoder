<?php

list($s) = strs();
echo count(array_unique(str_split($s))) === strlen($s) ? 'yes' : 'no';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
