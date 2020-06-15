<?php
list($s) = strs();
$n = strlen($s);
$ans = '';
for ($i = 0; $i < $n; $i += 2) $ans .= $s[$i];
echo $ans;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
