<?php

list($x) = ints();
$i = $sum =  0;
while ($sum < $x) {
    $i++;
    $sum += $i;
}
echo $i;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
