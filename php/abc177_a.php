<?php

list($d, $t, $s) = ints();
echo $d > $t * $s ? 'No' : 'Yes';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
