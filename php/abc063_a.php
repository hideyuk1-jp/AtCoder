<?php
list($a, $b) = ints();
echo $a + $b >= 10 ? 'error' : $a + $b;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
