<?php
$s = strs();
echo strtoupper($s[0][0] . $s[1][0] . $s[2][0]);
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
