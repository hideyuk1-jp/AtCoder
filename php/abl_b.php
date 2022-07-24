<?php

[$a, $b, $c, $d] = ints();
echo $a > $d || $b < $c ? 'No' : 'Yes';
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
