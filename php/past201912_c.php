<?php
$a = ints();
rsort($a);
echo $a[2];
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
