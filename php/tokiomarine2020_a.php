<?php
list($s) = strs();
echo substr($s, 0, 3);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
