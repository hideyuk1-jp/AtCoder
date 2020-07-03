<?php
list($s) = strs();
echo substr($s, 0, -8);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
