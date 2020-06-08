<?php
list($x) = ints();
list($a) = ints();
list($b) = ints();
echo ($x - $a) % $b;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
