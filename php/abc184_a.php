<?php
[$a, $b] = ints();
[$c, $d] = ints();
echo $a * $d - $b * $c;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
