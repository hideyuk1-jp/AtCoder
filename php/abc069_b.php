<?php
list($s) = strs();
echo $s[0] . (strlen($s) - 2) . $s[strlen($s) - 1];
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
