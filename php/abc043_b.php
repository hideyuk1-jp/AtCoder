<?php
list($s) = strs();
$a = '';
for ($i = 0; $i < strlen($s); ++$i) {
    if ($s[$i] === 'B') $a = substr($a, 0, -1);
    else $a .= $s[$i];
}
echo $a;
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
