<?php
$a = ints();
echo $a[0] * $a[1] * 2 + $a[1] * $a[2] * 2 + $a[0] * $a[2] * 2;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
