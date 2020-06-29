<?php
list($s) = strs();
$a = ['N' => 0, 'S' => 0, 'E' => 0, 'W' => 0];
for ($i = 0; $i < strlen($s); ++$i) $a[$s[$i]] = 1;
echo $a['N'] ^ $a['S'] || $a['E'] ^ $a['W'] ? 'No' : 'Yes';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
