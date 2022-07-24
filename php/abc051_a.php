<?php

list($s) = strs();
echo str_replace(',', ' ', $s);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
