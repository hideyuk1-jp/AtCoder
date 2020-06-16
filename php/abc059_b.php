<?php
list($a) = strs();
list($b) = strs();
if (strlen($a) > strlen($b)) exit('GREATER');
if (strlen($a) < strlen($b)) exit('LESS');
for ($i = 0; $i < strlen($a); ++$i) {
    if ((int) $a[$i] > (int) $b[$i]) exit('GREATER');
    if ((int) $a[$i] < (int) $b[$i]) exit('LESS');
}
echo 'EQUAL';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
