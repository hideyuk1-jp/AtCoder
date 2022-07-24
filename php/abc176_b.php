<?php

list($s) = strs();
$sum = 0;
for ($i = 0; $i < strlen($s); ++$i) {
    $sum += $s[$i];
}
echo $sum % 9 ? 'No' : 'Yes';
function strs()
{
    return explode(' ', trim(fgets(STDIN)));
}
