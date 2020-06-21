<?php
list($s) = strs();
echo strtoupper($s) === $s ? 'A' : 'a';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
