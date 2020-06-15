<?php
list($n) = ints();
$ans = 1;
while ($ans * 2 <= $n) $ans *= 2;
echo $ans;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
