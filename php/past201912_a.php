<?php
list($s) = strs();
echo is_numeric($s) ? (int)$s * 2 : 'error';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
