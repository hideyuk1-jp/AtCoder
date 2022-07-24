<?php

list($s) = strs();
echo strlen($s) === 3 ? strrev($s) : $s;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
