<?php
list($a, $b) = ints();
echo ($a + $b) % 24;
function ints()
{
    return array_map('intval', explode(' ', trim(fgets(STDIN))));
}
